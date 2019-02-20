<?php
/**
 * ContainerHBoxView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerHBoxView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        $notebook1 = new TNotebook;
        $notebook2 = new TNotebook;
        
        $notebook1->appendPage('page1', new TLabel('Page 1'));
        $notebook1->appendPage('page2', new TLabel('Page 2'));
        
        $notebook2->appendPage('page1', new TLabel('Page 1'));
        $notebook2->appendPage('page2', new TLabel('Page 2'));
        
        $notebook1->setSize(140,100);
        $notebook2->setSize(140,100);
        
        // creates the horizontal box
        $hbox = new THBox;
        $hbox->add($notebook1);
        $hbox->add($notebook2);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($hbox);
        
        parent::add($vbox);
    }
}
