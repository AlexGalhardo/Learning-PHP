<?php
/**
 * Category Active Record
 * @author  <your-name-here>
 */
class Category extends TRecord
{
    const TABLENAME = 'category';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Return the translated description
     */
    public function get_description_translated()
    {
        return _t($this-> description);
    }
}
?>