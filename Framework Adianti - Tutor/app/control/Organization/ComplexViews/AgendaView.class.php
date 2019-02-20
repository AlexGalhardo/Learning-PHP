<?php
/**
 * AgendaView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AgendaView extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        // create the HTML Renderer
        $this->html = new THtmlRenderer('app/resources/agenda.html');

        // define replacements for the main section
        $replaces = array();
        
        try
        {
            // load the products
            TTransaction::open('samples');
            $entries = AgendaEntry::getWeekEntries();
            $first_date = AgendaEntry::getFirstWeekDay();
            
            $replace_detail = array();
            if ($entries)
            {
                // iterate products
                foreach ($entries as $entry)
                {
                    $ordered_entries[$entry->entry_date][(int) $entry->start_hour] = $entry;
                }
                
                for ($day=0; $day<7; $day++)
                {
                    $dt = new DateTime( $first_date );
                    $dt->add( new DateInterval('P'.$day.'D'));
                    $filter_date = $dt->format('Y-m-d');
                    $replaces['day'.($day+1)] = '';
                        
                    if (isset($ordered_entries[$filter_date]))
                    {
                        for ($hour = 0; $hour< 24; $hour++)
                        {
                            if (isset($ordered_entries[$filter_date][$hour]))
                            {
                                $entry = $ordered_entries[$filter_date][$hour];
                                
                                $replace_entry = $entry->toArray();
                                $replace_entry['height'] = $entry->duration * 24;
                                $replace_entry['hour'] = $hour;
                                
                                $entry_html = new THtmlRenderer('app/resources/agenda_entry.html');
                                $entry_html->enableSection('main', $replace_entry);
                                
                                $replaces['day'.($day+1)] .= $entry_html->getContents(); // array of replacements
                                $hour += $entry->duration -1;
                            }
                            else
                            {
                                $entry_html = new THtmlRenderer('app/resources/agenda_entry_empty.html');
                                $entry_html->enableSection('main', array('popmenu'=> 'fa-plus-square-o', 'day'=>$filter_date, 'hour'=>$hour));
                                $replaces['day'.($day+1)] .= $entry_html->getContents();
                            }
                        }
                    }
                    else
                    {
                        for ($hour = 0; $hour< 24; $hour++)
                        {
                            $entry_html = new THtmlRenderer('app/resources/agenda_entry_empty.html');
                            $entry_html->enableSection('main', array('popmenu'=> 'fa-plus-square-o', 'day'=>$filter_date, 'hour'=>$hour));
                            $replaces['day'.($day+1)] .= $entry_html->getContents();
                        }
                    }
                }
            }
            else
            {
                for ($day=0; $day<7; $day++)
                {
                    $dt = new DateTime( $first_date );
                    $dt->add( new DateInterval('P'.$day.'D'));
                    $filter_date = $dt->format('Y-m-d');
                    $replaces['day'.($day+1)] = '';
                    
                    for ($hour = 0; $hour< 24; $hour++)
                    {
                        $entry_html = new THtmlRenderer('app/resources/agenda_entry_empty.html');
                        $entry_html->enableSection('main', array('popmenu'=> 'fa-plus-square-o', 'day'=>$filter_date, 'hour'=>$hour));
                        $replaces['day'.($day+1)] .= $entry_html->getContents();
                    }
                }
            }
            
            // enable products section as repeatable
            $this->html->enableSection('main', $replaces);
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->html);
        parent::add($vbox);
    }
    
    public function onDelete( $param )
    {
        // define the delete action
        $action = new TAction(array($this, 'Delete'));
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion('Do you really want to delete ?', $action);
    }
    
    /**
     * delete
     */
    public function Delete( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key=$param['key'];
                TTransaction::open('samples');
                $object = new AgendaEntry($key);
                $object->delete();
                TTransaction::close();
                
                $posAction = new TAction(array('AgendaView', 'reload'));
                // shows the success message
                new TMessage('info', 'Record deleted', $posAction);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            TTransaction::rollback();
        }
    }
    
    public function reload()
    {
    }
}
