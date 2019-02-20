<?php
/**
 * ContainerTableColumnsView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerTableColumnsView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates a table
        $table = new TTable;
        
        // creates a label with the title
        $title = new TLabel('Table Columns');
        $title->setFontSize(18);
        $title->setFontFace('Arial');
        $title->setFontColor('red');
        
        // adds a row to the table
        $row = $table->addRow();
        $title = $row->addCell($title);
        $title->colspan = 2;
        
        // creates a series of input widgets
        $id         = new TEntry('id');
        $name       = new TEntry('name');
        $address    = new TEntry('address');
        $telephone  = new TEntry('telephone');
        $city       = new TCombo('city');
        $text       = new TText('text');
        
        $items      = array();
        $items['1'] = 'Porto Alegre';
        $items['2'] = 'Lajeado';
        $city->addItems($items);
        
        // adjust the size of the code
        $id->setSize(70);
        
        // add rows for the fields
        $table->addRowSet( new TLabel('Code'),      $id );
        $table->addRowSet( new TLabel('Name'),      $name );
        $table->addRowSet( new TLabel('City'),      $city );
        $table->addRowSet( new TLabel('Address'),   $address );
        $table->addRowSet( new TLabel('Telephone'), $telephone );
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($table);
        
        parent::add($vbox);
    }
}
