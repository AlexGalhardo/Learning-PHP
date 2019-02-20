<?php
/**
 * Active Record for agregation between Customer and Skill
 * @author  Pablo Dall'Oglio
 */
class CustomerSkill extends TRecord
{
    const TABLENAME = 'customer_skill';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('customer_id');
        parent::addAttribute('skill_id');
    }
}
?>