<?php
/**
 * ContainerFrameView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerFrameView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates a notebook
        $notebook = new TNotebook;
        
        // creates the notebook page
        $page = new TTable;
        $page->width = '100%';
        
        // adds the notebook page
        $notebook->appendPage('Register data', $page);
        
        // create the form fields
        $field1 = new TEntry('field1');
        $field2 = new TEntry('field2');
        $field3 = new TEntry('field3');
        $field4 = new TCombo('field4');
        $field5 = new TEntry('field5');
        $field6 = new TEntry('field6');
        $field7 = new TEntry('field7');
        $field8 = new TEntry('field8');
        $field9 = new TEntry('field9');
        
        // creates an array with items
        $units = array();
        $units['PC'] ='Piece';
        $units['LT'] ='Liter';
        $units['ML'] ='Milliliter';
        $units['GL'] ='Gallon';
        $units['KG'] ='Kilogram';
        $units['GR'] ='Gram';
        // add the items to the combo
        $field4->addItems($units);
        
        // define some sizes
        $field1->setEditable(FALSE);
        $field1->setSize('100%');
        $field2->setSize('100%');
        $field4->setSize('100%');
        $field3->setSize('100%');
        $field5->setSize('100%');
        $field6->setSize('100%');
        $field7->setSize('100%');
        $field8->setSize('100%');
        $field9->setSize('100%');
        
        // add a row for one field
        $row=$page->addRow();
        $row->addCell(new TLabel('Id:'));
        $cell = $row->addCell($field1);
        
        // add a row for one field
        $row=$page->addRow();
        $row->addCell(new TLabel('Description:'));
        $cell=$row->addCell($field2);
        
        // creates a frame
        $frame = new TFrame;
        $frame->oid = 'frame-measures';
        $frame->setLegend('Measures');
        
        $button = new TButton('show_hide');
        $button->class = 'btn btn-default btn-sm active';
        $button->setLabel('Show/hide measures');
        $button->addFunction("\$('[oid=frame-measures]').slideToggle(); $(this).toggleClass( 'active' )");
        $row=$page->addRow();
        $row->addCell($button);
        
        // add the frame inside the table
        $row=$page->addRow();
        $cell=$row->addCell($frame);
        $cell->colspan=2;
        
        // adds another table inside the frame
        $page2 = new TTable;
        $frame->add($page2);
        
        // add a row for tow fields
        $row=$page2->addRow();
        $row->addCell(new TLabel('Stock:'));
        $row->addCell($field3);
        $row->addCell(new TLabel('Unit:'));
        $row->addCell($field4);
        
        // add a row for tow fields
        $row=$page2->addRow();
        $row->addCell(new TLabel('Cost Price:'));
        $row->addCell($field5);
        $row->addCell(new TLabel('Sell Price:'));
        $row->addCell($field6);
        
        // add a row for tow fields
        $row=$page2->addRow();
        $row->addCell(new TLabel('Net Weight:'));
        $row->addCell($field7);
        $row->addCell(new TLabel('Gross Weight:'));
        $row->addCell($field8);
        
        // add just another field
        $row=$page->addRow();
        $row->addCell(new TLabel('Another field:'));
        $cell=$row->addCell($field9);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($notebook);
        parent::add($vbox);
    }
}
