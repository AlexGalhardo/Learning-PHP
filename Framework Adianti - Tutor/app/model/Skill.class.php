<?php
/**
 * Active Record for Skill
 * @author  Pablo Dall'Oglio
 */
class Skill extends TRecord
{
    const TABLENAME = 'skill';
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