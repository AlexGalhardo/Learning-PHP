<?php
/*
 * class Contact
 * Active Record for Contact table
 * @author  Pablo Dall'Oglio
 */
class Contact extends TRecord
{
    const TABLENAME = 'contact';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('type');
        parent::addAttribute('value');
        parent::addAttribute('customer_id');
    }
}
?>