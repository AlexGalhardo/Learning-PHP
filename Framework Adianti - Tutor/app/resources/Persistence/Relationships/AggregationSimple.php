<?php
/**
 * Customer Active Record
 * @author  <your-name-here>
 */
class Customer extends TRecord
{
    const TABLENAME = 'customer';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $skills;

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
     * Reset aggregates
     */
    public function clearParts()
    {
        $this->skills = array();
    }

    /**
     * Load the object and its aggregates
     * @param $id object ID
     */
    public function load($id)
    {
        $this->skills = parent::loadAggregate('Skill', 'CustomerSkill', 'customer_id', 'skill_id', $id);
    
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
    }

    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        parent::deleteComposite('CustomerSkill', 'customer_id', $id);
    
        // delete the object itself
        parent::delete($id);
    }
}

/**
 * USAGE
 */
$customer= new Customer(4); // lodas the customer 4

// add two skills
$customer->addSkill(new Skill(1));
$customer->addSkill(new Skill(2));

// stores the customer and the references to the skills
// using CustomerSkill class (that handles customer_skill association table).
$customer->store();
