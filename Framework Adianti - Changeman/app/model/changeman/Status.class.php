<?php
/**
 * Status Active Record
 * @author  <your-name-here>
 */
class Status extends TRecord
{
    const TABLENAME = 'status';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Returns the state complete description
     */
    public function get_complete_description()
    {
        return _t($this-> description) . ($this-> final_state == 'Y' ? ' ('._t('Final state').')' : '');
    }
    
    /**
     * Return the translated description
     */
    public function get_description_translated()
    {
        return _t($this-> description);
    }
}
?>