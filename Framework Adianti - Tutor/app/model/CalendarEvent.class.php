<?php
/**
 * CalendarEvent Active Record
 * @author  <your-name-here>
 */
class CalendarEvent extends TRecord
{
    const TABLENAME = 'calendar_event';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('start_time');
        parent::addAttribute('end_time');
        parent::addAttribute('color');
        parent::addAttribute('title');
        parent::addAttribute('description');
    }


}
