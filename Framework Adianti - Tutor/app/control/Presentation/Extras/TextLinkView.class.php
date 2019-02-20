<?php
/**
 * TextLinkView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TextLinkView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $action = new TAction( ['CustomerFormView', 'onEdit' ] );
        $action->setParameter('key', 2);
        
        $a = new TTextDisplay('Text Display', 'red', 12, 'bi');
        $a2 = new TTextDisplay(number_format(100, 2,',', '.'), 'red', 12, 'bi' );
        $a3 = new TTextDisplay(TDate::convertToMask('2016-09-30', 'yyyy-mm-dd', 'dd/mm/yyyy'), 'red', 12, 'bi' );
        
        $b = new TActionLink('Action Link', $action, 'blue', 12, 'biu');
        $b2 = new TActionLink('Action Link2', $action, 'white', 10, '', 'fa:check-square-o #FEFF00');
        $b2->class='btn btn-success';
        
        $c = new THyperLink('Hyper Link (file)', 'app/output/tabular.pdf', 'green', 12, 'biu');
        $c2 = new THyperLink('Hyper Link (url)', 'http://www.google.com', 'orange', 12, 'biu');
        $c3 = new THyperLink('Hyper Link (url)', 'http://www.google.com', 'white', 10, '', 'fa:external-link white');
        $c3->class='btn btn-info';
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($a);
        $vbox->add($a2);
        $vbox->add($a3);
        $vbox->add( new TElement('br') );
        $vbox->add($b);
        $vbox->add($b2);
        $vbox->add( new TElement('br') );
        $vbox->add($c);
        $vbox->add($c2);
        $vbox->add($c3); 
        
        parent::add( $vbox );
    }
}
