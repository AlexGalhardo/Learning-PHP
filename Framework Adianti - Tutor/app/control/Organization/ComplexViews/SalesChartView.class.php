<?php
/**
 * Sales Chart
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SalesChartView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        try
        {
            TTransaction::open('samples');
            $conn = TTransaction::get(); // get PDO connection
            
            // run query
            $result = $conn->query('select date, sum(total) as sales, sum(total*0.1) as commission, sum(total*0.2) as taxes from sale group by 1');
            
            $data = array();
            $data[] = [ 'Day', 'Sales', 'Comission', 'Taxes' ];
            
            foreach ($result as $row) 
            { 
                $data[] = [ $row['date'], (float) $row['sales'], (float) $row['commission'], (float) $row['taxes'] ]; 
            } 
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        $html = new THtmlRenderer('app/resources/google_bar_chart.html');
        $panel = new TPanelGroup('Sales chart');
        $panel->add($html);
        
        // replace the main section variables
        $html->enableSection('main', array('data'   => json_encode($data),
                                           'width'  => '100%',
                                           'height'  => '300px'));
        
        // add the template to the page
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($panel);
        parent::add($container);
    }
}
