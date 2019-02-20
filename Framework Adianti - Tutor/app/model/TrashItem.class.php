<?php
/**
 * Trash Active Record
 * @author  <your-name-here>
 */
class TrashItem extends TRecord
{
    const TABLENAME = 'trash_item';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('content');
    }


}
