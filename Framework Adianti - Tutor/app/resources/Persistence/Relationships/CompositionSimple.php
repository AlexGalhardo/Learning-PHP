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
     * Reset aggregates
     */
    public function clearParts()
    {
        $this->contacts = array();
    }

    /**
     * Load the object and its aggregates
     * @param $id object ID
     */
    public function load($id)
    {
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
    
        parent::saveComposite('Contact', 'customer_id', $this->id, $this->contacts);
    }

    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        parent::deleteComposite('Contact', 'customer_id', $id);
    
        // delete the object itself
        parent::delete($id);
    }
}

/**
 * USAGE
 */
 
$customer= new Customer(4); // Loads customer

$contact1 = new Contact; // create contact
$contact2 = new Contact; // create contact

$contact1->type  = 'fone';
$contact1->value = '78 2343-4545';
$contact2->type  = 'fone';
$contact2->value = '78 9494-0404';

$customer->addContact($contact1);
$customer->addContact($contact2);

// Store the customer and its contacts in the related table
$customer->store();
