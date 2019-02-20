<?php
/**
 * Active Record for table Category
 * @author  Pablo Dall'Oglio
 */
class Category extends TRecord
{
    const TABLENAME = 'category';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('name');
    }
}
?>
