<?php
/**
 * Test Active Record
 * @author  <your-name-here>
 */
class Test extends TRecord
{
    const TABLENAME = 'test';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('name');
        parent::addAttribute('state_id');
        parent::addAttribute('city_id');
        parent::addAttribute('customer_id');
    }
}
