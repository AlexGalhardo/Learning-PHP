<?php
/**
 * AgendaEntry Active Record
 * @author  <your-name-here>
 */
class AgendaEntry extends TRecord
{
    const TABLENAME = 'agenda_entry';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('entry_date');
        parent::addAttribute('start_hour');
        parent::addAttribute('duration');
        parent::addAttribute('title');
        parent::addAttribute('description');
    }

    public static function getFirstWeekDay()
    {
        $wday = str_pad(date('w'), 2, '0', STR_PAD_LEFT);
        $dia = str_pad(date('d',mktime(0,0,0,date('m'),date('d')-$wday,date('Y'))), 2, '0', STR_PAD_LEFT);
        $mes = str_pad(date('m',mktime(0,0,0,date('m'),date('d')-$wday,date('Y'))), 2, '0', STR_PAD_LEFT);
        $ano = str_pad(date('Y',mktime(0,0,0,date('m'),date('d')-$wday,date('Y'))), 2, '0', STR_PAD_LEFT);
        return "{$ano}-{$mes}-{$dia}";
    }
    
    public static function getLastWeekDay()
    {
        $wday = str_pad(date('w'), 2, '0', STR_PAD_LEFT);
        $diff = 6-$wday;
    
        $dia = str_pad(date('d',mktime(0,0,0,date('m'),date('d')+$diff,date('Y'))), 2, '0', STR_PAD_LEFT);
        $mes = str_pad(date('m',mktime(0,0,0,date('m'),date('d')+$diff,date('Y'))), 2, '0', STR_PAD_LEFT);
        $ano = str_pad(date('Y',mktime(0,0,0,date('m'),date('d')+$diff,date('Y'))), 2, '0', STR_PAD_LEFT);
        return "{$ano}-{$mes}-{$dia}";
    }
    
    /**
     * Return the week entries
     * @return AgendaEntry[]
     */
    public static function getWeekEntries()
    {
        $first_week_day = self::getFirstWeekDay();
        $last_week_day = self::getLastWeekDay();
        
        // load objects
        $repo = new TRepository('AgendaEntry');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('entry_date', '>=', $first_week_day));
        $criteria->add(new TFilter('entry_date', '<=', $last_week_day));
        $criteria->setProperty('order', 'entry_date, start_hour');
        
        return $repo->load( $criteria );
    }
}
