<?php
/**
 * Active Record for table City
 * @author  Pablo Dall'Oglio
 */
class City extends TRecord
{
    const TABLENAME = 'city';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('name');
        parent::addAttribute('state_id');
    }
    
    /**
     * Returns the state
     */
    public function get_state()
    {
        return State::find($this->state_id);
    }
    
    /**
     * Method getCustomers
     */
    public function getCustomers()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('city_id', '=', $this->id));
        return Customer::getObjects( $criteria );
    }
}
