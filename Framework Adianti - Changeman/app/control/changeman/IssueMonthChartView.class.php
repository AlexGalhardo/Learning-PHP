<?php
/**
 * IssueMonthChartView
 * @author  <your name here>
 */
class IssueMonthChartView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct( $show_breadcrumb )
    {
        parent::__construct();
        
        try
        {
            $html = new THtmlRenderer('app/resources/google_bar_chart.html');
            
            $meses = [ 1 => 'January', 2 => 'February',  3 => 'March',     4 => 'April',    5 => 'May',       6 => 'June',
                       7 => 'July',    8 => 'August',    9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December' ];
            
            $data = array();
            $data[] = [ 'Month', 'Count' ];
            
            TTransaction::open('changeman');
            $pedidos_mes = IssueService::getIssueByMonth( date('Y') );
            TTransaction::close();
            
            foreach ($pedidos_mes as $mes => $valor)
            {
                $data[] = [ $meses[ (int)$mes], $valor ];
            }
            
            $panel = new TPanelGroup('Issue / month - ' . date('Y'));
            $panel->style = 'width:100%';
            $panel->add($html);
            
            // replace the main section variables
            $html->enableSection('main', array('data'   => json_encode($data),
                                               'uniqid'  => uniqid(),
                                               'width'  => '100%',
                                               'height' => '300px',
                                               'title'  => _t('Issue') .'/'. _t('Month'),
                                               'ytitle' => _t('Issue'),
                                               'xtitle' => _t('Month')));
            $container = new TVBox;
            $container->style = 'width: 100%';
            if ($show_breadcrumb)
            {
                $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
            }
            $container->add($panel);
            parent::add($container);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
