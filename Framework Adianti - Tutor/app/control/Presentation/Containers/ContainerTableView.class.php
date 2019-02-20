<?php
/**
 * ContainerTableView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerTableView extends TPage
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
        $title = new TLabel('Table Layout');
        $title->setFontSize(18);
        $title->setFontFace('Arial');
        $title->setFontColor('red');
        
        // adds a row to the table
        $row = $table->addRow();
        $title = $row->addCell($title);
        $title->colspan = 2;
        
        // creates two sub-tables
        $table1 = new TTable;
        $table2 = new TTable;
        
        // master table properties
        $table->border = '1';
        $table->cellpadding = '4';
        $table->style = 'border-collapse:collapse;';
        
        // table1 properties
        $table1->border = '1';
        $table1->cellpadding = '2';
        $table1->style = 'border-collapse:collapse; border-color: red';
        
        // table2 properties
        $table2->border = '1';
        $table2->cellpadding = '2';
        $table2->style = 'border-collapse:collapse; border-color: blue';
        
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
        
        // adjust the size of the fields
        $id->setSize(70);
        $name->setSize('100%');
        $address->setSize('100%');
        $telephone->setSize('100%');
        $city->setSize('100%');
        $text->setSize('100%',100);
        
        // creates a series of labels
        $label1 = new TLabel('Code');
        $label2 = new TLabel('Name');
        $label3 = new TLabel('City');
        $label4 = new TLabel('Address');
        $label5 = new TLabel('Telephone');
        
        // adds a row for the code field
        $row=$table1->addRow();
        $row->addCell($label1);
        $row->addCell($id);
        
        // adds a row for the name field
        $row=$table1->addRow();
        $row->addCell($label2);
        $row->addCell($name);
        
        // adds a row for the city field
        $row=$table1->addRow();
        $row->addCell($label3);
        $row->addCell($city);
        
        // adds a row for the address field
        $row=$table2->addRow();
        $row->addCell($label4);
        $row->addCell($address);
        
        // adds a row for the phone field
        $row=$table2->addRow();
        $row->addCell($label5);
        $row->addCell($telephone);
        
        // adds the tables side by side
        $row=$table->addRow();
        $row->addCell($table1);
        $row->addCell($table2);
        
        $row=$table->addRow();
        $cell=$row->addCell($text);
        $cell->colspan=2;
        
        $label6=new TLabel('Obs');
        $label6->setFontStyle('b');
        $label6->setValue('PS: The table borders are just for understanding purposes.');
        $row=$table->addRow();
        $cell=$row->addCell($label6);
        $cell->colspan=2;
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($table);
        
        parent::add($vbox);
    }
}
