<?php
/**
 * Contact Active Record
 * @author  <your-name-here>
 */
class Contact extends TRecord
{
    const TABLENAME = 'contact';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('name');
        parent::addAttribute('email');
        parent::addAttribute('number');
        parent::addAttribute('address');
        parent::addAttribute('notes');
    }


}
