<?php
/**
 * BreadCrumbView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class BreadCrumbView extends TPage
{
    private $step;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        $this->step = new TBreadCrumb;
        $this->step->addItem('Step 1', FALSE);
        $this->step->addItem('Step 2', FALSE);
        $this->step->addItem('Step 3', TRUE);
        $this->step->select('Step 1');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->step);
        
        parent::add($vbox);
    }
}
