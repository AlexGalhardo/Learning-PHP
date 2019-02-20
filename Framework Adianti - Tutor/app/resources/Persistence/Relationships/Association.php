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
    
    
    private $category;

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
}

// load Customer 1
$object = new Customer(1);

// prints the name of the associated Category object.
// Automatically call $object->get_category()->name
print $object->category->name;
