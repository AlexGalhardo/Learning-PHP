<?php
/**
 * MultiStepFormView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MultiStepFormView extends TPage
{
    private $notebook;
    private $form;
    private $page1;
    private $page2;
    private $page3;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // create the notebook
        $this->notebook = new TNotebook;
        
        // create the form
        $this->form = new TForm;
        
        // creates the notebook page
        $page1 = new TTable;
        $page2 = new TTable;
        $page3 = new TTable;
        
        // add the notebook inside the form
        $this->form->add($this->notebook);
        
        // adds the notebook page
        $this->notebook->appendPage('Page 1', $page1);
        $this->notebook->appendPage('Page 2', $page2);
        $this->notebook->appendPage('Page 3', $page3);
        
        // create the form fields
        $field1 = new TEntry('field1');
        $field2 = new TEntry('field2');
        $field3 = new TEntry('field3');
        $field4 = new TEntry('field4');
        $field5 = new TEntry('field5');
        $field6 = new TEntry('field6');
        
        // add a row for one field
        $row=$page1->addRow();
        $row->addCell(new TLabel('Type a name:'));
        $cell = $row->addCell( $field1 );
        
        // add a row for one field
        $row=$page1->addRow();
        $row->addCell(new TLabel('Type anything:'));
        $cell = $row->addCell( $field2 );
        
        // creates the action button
        $button1=new TButton('action1');
        $button1->setAction(new TAction(array($this, 'onStep2')), 'Next');
        $button1->setImage('fa:chevron-circle-right blue');
        $row=$page1->addRow();
        $row->addCell( $button1 );
        
        // add a row for one field
        $row=$page2->addRow();
        $row->addCell(new TLabel('The name you typed:'));
        $cell = $row->addCell( $field3 );
        
        // add a row for one field
        $row=$page2->addRow();
        $row->addCell(new TLabel('Type another name:'));
        $cell = $row->addCell( $field4 );
        
        // creates the action button
        $button2=new TButton('action2');
        $button2->setAction(new TAction(array($this, 'onStep1')), 'Previous');
        $button2->setImage('fa:chevron-circle-left orange');
        $row=$page2->addRow();
        $row->addCell( $button2 );
        
        // creates the action button
        $button3=new TButton('action3');
        $button3->setAction(new TAction(array($this, 'onStep3')), 'Next');
        $button3->setImage('fa:chevron-circle-right blue');
        $row->addCell( $button3 );
        
        // add a row for one field
        $row=$page3->addRow();
        $row->addCell(new TLabel('The name you typed:'));
        $cell = $row->addCell( $field5 );
        
        // add a row for one field
        $row=$page3->addRow();
        $row->addCell(new TLabel('Type another thing:'));
        $cell = $row->addCell( $field6 );
        
        // creates the action button
        $button4=new TButton('action4');
        $button4->setAction(new TAction(array($this, 'onStep2')), 'Previous');
        $button4->setImage('fa:chevron-circle-left orange');
        $row=$page3->addRow();
        $row->addCell( $button4 );
        
        $button5=new TButton('save');
        $button5->setAction(new TAction(array($this, 'onSave')), 'Save');
        $button5->setImage('fa:save');
        $row->addCell( $button5 );
        
        // define wich are the form fields
        $this->form->setFields(array($field1, $field2, $field3, $field4, $field5, $field6, $button1, $button2, $button3, $button4, $button5));
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        //$vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    function onStep1()
    {
        $this->notebook->setCurrentPage(0);
        $this->form->setData($this->form->getData());
    }
    
    function onStep2()
    {
        $data = $this->form->getData();
        $data->field3 = 'Hi '. $data->field1;
        $this->notebook->setCurrentPage(1);
        $this->form->setData($data);
    }
    
    function onStep3()
    {
        $data = $this->form->getData();
        $data->field5 = 'Hi '. $data->field4;
        $this->notebook->setCurrentPage(2);
        $this->form->setData($data);
    }
    
    function onSave()
    {
        $this->notebook->setCurrentPage(2);
        $this->form->setData($this->form->getData());
        new TMessage('info', str_replace('"field', '<br>"field ', json_encode($this->form->getData())));
    }
}
