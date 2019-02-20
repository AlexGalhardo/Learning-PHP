<?php
/**
 * Chart
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
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
        $div->add( $a = new BarChartView(false) );
        $div->add( $b = new LineChartView(false) );
        $div->add( $c = new PieChartView(false) );
        $div->add( $d = new PieChartView(false) );
        
        $a->class = 'col-sm-6';
        $b->class = 'col-sm-6';
        $c->class = 'col-sm-6';
        $d->class = 'col-sm-6';
        
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($div);
        
        parent::add($vbox);
    }
}
