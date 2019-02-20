<?php
/**
 * ContainerTableMultiCellView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerTableMultiCellView extends TPage
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
        $title = new TLabel('Table Multi Cell');
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
        $min        = new TEntry('min');
        $max        = new TEntry('max');
        $start_date = new TDate('start_date');
        $end_date   = new TDate('end_date');
        $address    = new TEntry('address');
        
        // adjust the size of the code
        $id->setSize(70);
        $start_date->setSize(70);
        $end_date->setSize(70);
        $min->setSize(87);
        $max->setSize(87);
        
        // add rows for the fields
        $table->addRowSet( new TLabel('Code'),      $id );
        $table->addRowSet( new TLabel('Name'),      $name );
        
        // first approach
        $table->addRowSet( new TLabel('Value'),     array( $min,  new TLabel('To'), $max) );
        
        // second approach
        $row = $table->addRow();
        $row->addCell(new TLabel('Date'));
        $row->addMultiCell( $start_date, $end_date);
        
        $table->addRowSet( new TLabel('Address'),      $address );
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($table);
        
        parent::add($vbox);
    }
}
