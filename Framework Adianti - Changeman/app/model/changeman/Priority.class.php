<?php
/**
 * Priority Active Record
 * @author  <your-name-here>
 */
class Priority extends TRecord
{
    const TABLENAME = 'priority';
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