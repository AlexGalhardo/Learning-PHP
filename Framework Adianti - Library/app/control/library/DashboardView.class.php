<?php
/**
 * DashboardView
 * @author  <your name here>
 */
class DashboardView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        
        $div = new TElement('div');
        $div->add( $a=new LoanMonthChartView(false) );
        $div->add( $b=new BookByClassificationChart(false) );
        $div->add( $c=new BookByCollectionChart(false) );
        
        $a->class = 'col-sm-12';
        $b->class = 'col-sm-6';
        $c->class = 'col-sm-6';
        
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->style = 'float:left; width: 100%';
        $vbox->add($div);
        
        parent::add($vbox);
    }
}
