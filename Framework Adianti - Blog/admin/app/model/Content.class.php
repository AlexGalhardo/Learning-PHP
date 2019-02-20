<?php
/**
 * Content Active Record
 * @author  <your-name-here>
 */
class Content extends TRecord
{
    const TABLENAME = 'content';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('title');
        parent::addAttribute('subtitle');
        parent::addAttribute('sidepanel');
    }


}
?>