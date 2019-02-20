<?php
/**
 * DynamicMultiStepFormView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DynamicMultiStepFormView extends TPage
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
        
        // add the notebook inside the form
        $this->form->add($this->notebook);
        
        // adds the notebook page
        $this->notebook->appendPage('Page 1', $page1);
        
        // create the form fields
        $field1 = new TCombo('field1');
        $field2 = new TCombo('field2');
        $field1->addValidation( 'Field 1', new TRequiredValidator);
        $field2->addValidation( 'Field 2', new TRequiredValidator);
        
        $field1->addItems( array('combo' => 'TCombo', 'radio' => 'TRadioGroup', 'check' => 'TCheckGroup'));
        $field2->addItems( array('1' => 'Gender', '2' => 'Ocupation'));
        
        // add a row for one field
        $row=$page1->addRow();
        $row->addCell($l1=new TLabel('Next field type:'));
        $cell = $row->addCell( $field1 );
        
        // add a row for one field
        $row=$page1->addRow();
        $row->addCell($l2=new TLabel('Next field content:'));
        $cell = $row->addCell( $field2 );
        
        $l1->setFontColor('#FF0000');
        $l2->setFontColor('#FF0000');
        
        // creates the action button
        $button1=new TButton('action1');
        $button1->setAction(new TAction(array($this, 'onStep2')), 'Next');
        $button1->setImage('fa:chevron-circle-right blue');
        $row=$page1->addRow();
        $row->addCell( $button1 );
        
        // define wich are the form fields
        $this->form->setFields(array($field1, $field2, $button1));
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        //$vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    function onStep2()
    {
        try
        {
            $data = $this->form->getData();
            $this->form->validate();
            
            $page2 = new TTable;
            $this->notebook->appendPage('Page 2', $page2);
            
            $gender_options = array('M' => 'Male', 'F' => 'Female');
            $ocupation_optins = array('S' => 'Self employed', 'B' => 'Business', 'R' => 'Retired');
            
            switch ($data->field1)
            {
                case 'combo':
                    $field3 = new TCombo('field3');
                    break;
                case 'radio':
                    $field3 = new TRadioGroup('field3');
                    $field3->setLayout('horizontal');
                    break;
                case 'check':
                    $field3 = new TCheckGroup('field3');
                    $field3->setLayout('horizontal');
                    break;
            }
            $field3->addValidation( 'Field 3', new TRequiredValidator );
            
            switch ($data->field2)
            {
                case '1':
                    $label = 'Gender';
                    $field3->addItems( $gender_options );
                    break;
                case '2':
                    $label = 'Ocupation';
                    $field3->addItems( $ocupation_optins );
                    break;
            }
            
            $field4 = new TEntry('field4');
            $field4->addValidation('Field 4', new TRequiredValidator);
            
            // add a row for one field
            $row=$page2->addRow();
            $row->addCell($l3=new TLabel($label . ':'));
            $cell = $row->addCell( $field3 );
            
            // add a row for one field
            $row=$page2->addRow();
            $row->addCell($l4=new TLabel('Next tab title:'));
            $cell = $row->addCell( $field4 );
            
            $l3->setFontColor('#FF0000');
            $l4->setFontColor('#FF0000');
            
            // creates the action button
            $button2=new TButton('action2');
            $button2->setAction(new TAction(array($this, 'onStep3')), 'Next');
            $button2->setImage('fa:chevron-circle-right blue');
            $row=$page2->addRow();
            $row->addCell( $button2 );
            
            $this->form->addField($field3);
            $this->form->addField($field4);
            $this->form->addField($button2);
            
            $this->notebook->setCurrentPage(1);
            $this->form->setData($data);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    function onStep3()
    {
        $this->onStep2();
        
        try
        {
            $data = $this->form->getData();
            $this->form->validate();
            
            $page2 = new TTable;
            $this->notebook->appendPage( $data->field4, $page2);
            
            $field5 = new TLabel('field5');
            $field5->setValue( str_replace('"field', '<br>"field ', json_encode($this->form->getData())));
            
            // add a row for one field
            $row=$page2->addRow();
            $row->addCell(new TLabel('Form data:'));
            $cell = $row->addCell( $field5 );
            
            $this->notebook->setCurrentPage(2);
            $this->form->setData($data);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
