<?php
/**
 * Customer Active Record
 * @author  Pablo Dall'Oglio
 */
class Customer extends TRecord
{
    const TABLENAME    = 'customer';
    const PRIMARYKEY   = 'id';
    const IDPOLICY     =  'max'; // {max, serial}
    const CACHECONTROL = 'TAPCache';
    
    private $category;
    private $city;
    private $skills;
    private $contacts;

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('name');
        parent::addAttribute('address');
        parent::addAttribute('phone');
        parent::addAttribute('birthdate');
        parent::addAttribute('status');
        parent::addAttribute('email');
        parent::addAttribute('gender');
        parent::addAttribute('category_id');
        parent::addAttribute('city_id');
    }

    /**
     * Returns the Customer city name
     * Sample: print $customer->city_name;
     */
    public function get_city_name()
    {
        if (empty($this->city))
        {
            $this->city = new City($this->city_id);
        }
        
        return $this->city->name;
    }
    
    /**
     * Returns the Customer category name
     * Sample: print $customer->category_name;
     */
    public function get_category_name()
    {
        if (empty($this->category))
        {
            $this->category = new Category($this->category_id);
        }
        
        return $this->category->name;
    }
    
    /**
     * Encapsulate the birthdate property
     * Sample: $customer->birthdate = 'March, 8';
     */
    public function set_birthdate($value)
    {
        $parts = explode('-', $value);
        if (checkdate($parts[1], $parts[2], $parts[0]))
        {
            $this->data['birthdate'] = $value;
        }
        else
        {
            throw new Exception("Cannot set '{$value}' in birthdate");
        }
    }
    
    /**
     * Returns the customer sales
     */
    public function getSales()
    {
        return Sale::getCustomerSales($this->id);
    }
    
    /**
     * Method get_city
     * Sample of usage: $customer->city->attribute;
     * @returns City instance
     */
    public function get_city()
    {
        // loads the associated object
        if (empty($this->city))
            $this->city = new City($this->city_id);
    
        // returns the associated object
        return $this->city;
    }

    /**
     * Method set_city
     * Sample of usage: $customer->city = $object;
     * @param $object Instance of City
     */
    public function set_city(City $object)
    {
        $this->city = $object;
        $this->city_id = $object->id;
    }
    
    /**
     * Method set_category
     * Sample of usage: $customer->category = $object;
     * @param $object Instance of Category
     */
    public function set_category(Category $object)
    {
        $this->category = $object;
        $this->category_id = $object->id;
    }
    
    /**
     * Method get_category
     * Sample of usage: $customer->category->attribute;
     * @returns Category instance
     */
    public function get_category()
    {
        // loads the associated object
        if (empty($this->category))
            $this->category = new Category($this->category_id);
    
        // returns the associated object
        return $this->category;
    }
    

    /**
     * Reset aggregates
     */
    public function clearParts()
    {
        $this->skills = array();
        $this->contacts = array();
    }
    
    /**
     * Method addContact
     * Add a Contact to the Customer
     * @param $object Instance of Contact
     */
    public function addContact(Contact $object)
    {
        $this->contacts[] = $object;
    }
    
    /**
     * Method getContacts
     * Return the Customer' Contact's
     * @return Collection of Contact
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Method addSkill
     * Add a Skill to the Customer
     * @param $object Instance of Skill
     */
    public function addSkill(Skill $object)
    {
        $this->skills[] = $object;
    }
    
    /**
     * Method getSkills
     * Return the Customer' Skill's
     * @return Collection of Skill
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Load the object and its aggregates
     * @param $id object ID
     */
    public function load($id)
    {
        $this->skills = parent::loadAggregate('Skill', 'CustomerSkill', 'customer_id', 'skill_id', $id);
        $this->contacts = parent::loadComposite('Contact', 'customer_id', $id);
    
        // load the object itself
        return parent::load($id);
    }

    /**
     * Store the object and its aggregates
     */
    public function store()
    {
        // store the object itself
        parent::store();
    
        parent::saveAggregate('CustomerSkill', 'customer_id', 'skill_id', $this->id, $this->skills);
        parent::saveComposite('Contact', 'customer_id', $this->id, $this->contacts);
    }

    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->id;
        parent::deleteComposite('CustomerSkill', 'customer_id', $id);
        parent::deleteComposite('Contact', 'customer_id', $id);
    
        // delete the object itself
        parent::delete($id);
    }
}
?>