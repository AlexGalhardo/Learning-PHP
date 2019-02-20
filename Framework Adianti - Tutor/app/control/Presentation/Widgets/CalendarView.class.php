<?php
/**
 * CalendarView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CalendarView extends TPage
{
    private $form;
    private $calendar;
    private $back_action;
    private $next_action;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // create the calendar
        $this->calendar = new TCalendar;
        $this->calendar->setMonth(date('n'));
        $this->calendar->setYear(date('Y'));
        
        $this->calendar->selectDays(array( 8,9,10,11,12 ));
        $this->calendar->setSize(340,250);
        $this->calendar->setAction( new TAction(array($this, 'onSelect')) );
        
        // creates a simple form
        $this->form = new BootstrapFormBuilder('form_test');
        
        // creates the form fields
        $year  = new TEntry('year');
        $month = new TEntry('month');
        $day   = new TEntry('day');
        
        $year->setValue( $this->calendar->getYear() );
        $month->setValue( $this->calendar->getMonth() );
        
        $this->form->addFields([new TLabel('Year')],  [$year]);
        $this->form->addFields([new TLabel('Month')], [$month]);
        $this->form->addFields([new TLabel('Day')],   [$day]);
        
        $this->form->addAction('Back', new TAction(array($this, 'onBack')), 'fa:arrow-circle-o-left orange');
        $this->form->addAction('Next', new TAction(array($this, 'onNext')), 'fa:arrow-circle-o-right blue');
        
        // wrapper
        $hbox = new THBox;
        $hbox->add($this->calendar);
        $hbox->add($this->form);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($hbox);

        parent::add($vbox);
    }
    
    /**
     * Next month
     */
    public function onNext($param)
    {
        $data = $this->form->getData();
        if (!empty($data->month) and !empty($data->year))
        {
            $data->month ++;
            if ($data->month ==13)
            {
                $data->month = 1;
                $data->year ++;
            }
            $this->form->setData( $data );
            $this->calendar->setMonth($data->month);
            $this->calendar->setYear($data->year);
        }
    }
    
    /**
     * Previous month
     */
    public function onBack($param)
    {
        $data = $this->form->getData();
        if (!empty($data->month) and !empty($data->year))
        {
            $data->month --;
            if ($data->month == 0)
            {
                $data->month = 12;
                $data->year --;
            }
            $this->form->setData( $data );
            $this->calendar->setMonth($data->month);
            $this->calendar->setYear($data->year);
        }
    }
    
    /**
     * Executed when the user clicks at a tree node
     * @param $param URL parameters containing key and value
     */
    public static function onSelect($param)
    {
        $obj = new StdClass;
        $obj->year  = $param['year'];
        $obj->month = $param['month'];
        $obj->day   = $param['day'];
        
        $date = $obj->year . '-' . $obj->month . '-' . $obj->day;
        
        // fill the form with this object attributes
        TForm::sendData('form_test', $obj);
        
        new TMessage('info', 'You have selected: '. $date );
    }
}
