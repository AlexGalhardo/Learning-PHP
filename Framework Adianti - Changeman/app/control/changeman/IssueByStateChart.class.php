<?php
/**
 * IssueByStateChart
 * @author  <your name here>
 */
class IssueByStateChart extends TPage
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
            $html = new THtmlRenderer('app/resources/google_pie_chart.html');
            
            $data = array();
            $data[] = [ 'State', 'Count' ];
            
            TTransaction::open('changeman');
            $raw_data = IssueService::getIssueByState( date('Y') );
            TTransaction::close();
            
            foreach ($raw_data as $name => $value)
            {
                $data[] = [ $name, (float) $value ];
            }
            
            $panel = new TPanelGroup(_t('Issue') .'/'._t('State') . ' - ' . date('Y'));
            $panel->style = 'width:100%';
            $panel->add($html);
            
            // replace the main section variables
            $html->enableSection('main', array('data'   => json_encode($data),
                                               'uniqid' => uniqid(),
                                               'width'  => '100%',
                                               'height' => '300px',
                                               'title'  => _t('Issue') .'/'._t('State'),
                                               'ytitle' => 'Issue',
                                               'xtitle' => 'State'));
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
