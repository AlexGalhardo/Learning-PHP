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
        // load contacts
        $this->contacts = Contact::where('customer_id', '=', $id)->load();
        
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
        
        // delete contacts
        Contact::where('customer_id', '=', $this->id)->delete();

        // save contacts
        if ($this->contacts) 
        { 
            foreach ($this->contacts as $contact) 
            {
                unset($contact->id);
                $contact->customer_id = $this->id;
                $contact->store();
            } 
        }
    }
    
    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->id;
        
        // delete contacts
        Contact::where('customer_id', '=', $id)->delete();
        
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
