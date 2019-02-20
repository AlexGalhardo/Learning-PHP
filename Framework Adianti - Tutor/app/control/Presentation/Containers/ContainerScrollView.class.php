<?php
/**
 * ContainerScrollView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerScrollView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the scroll panel
        $scroll = new TScroll;
        $scroll->setSize('100%','300');
        
        // creates a table for the fields
        $fields_table = new TTable;
        // adds the table inside the scroll 
        $scroll->add($fields_table);
        
        // create the form fields
        $fields = array();
        for ($n=1; $n<=20; $n++)
        {
            $object = new TEntry('field'.$n);
            $fields[$n] = $object;
            
            // adds a row for each form field
            $row=$fields_table->addRow();
            $row->addCell(new TLabel('Field:'.$n));
            $row->addCell($object);
        }
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($scroll);
        
        parent::add($vbox);
    }
}
