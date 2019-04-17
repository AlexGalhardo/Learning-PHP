<?php
/**
 * FormQuickNotebookView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormQuickNotebookView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // create the form
        $this->form = new TQuickNotebookForm;
        $this->form->class = 'tform';
        $this->form->setFormTitle('Quick Tabbed Form');
        
        // set the notebook container
        $this->form->setNotebookWrapper( new BootstrapNotebookWrapper(new TNotebook) );
        
        // create the form fields
        $field1      = new TEntry('field1');
        $field2      = new TEntry('field2');
        $field3      = new TDate('field3');
        $field4      = new TDate('field4');
        $field5      = new TColor('field5');
        $field6      = new TCombo('field6');
        $field7      = new TEntry('field7');
        $field8      = new TRadioGroup('field8');
        $field9      = new TCheckGroup('field9');
        $field10     = new TSelect('field10');
        
        $items = array( 'a' => 'Item a', 'b' => 'Item b', 'c' => 'Item c' );
        $field6->addItems($items);
        $field8->addItems($items);
        $field9->addItems($items);
        $field10->addItems($items);
        $field8->setLayout('horizontal');
        $field9->setLayout('horizontal');
        
        // add the fields inside the form page 1
        $this->form->appendPage('Page 1');
        $this->form->addQuickField('Field 1', $field1,  40);
        $this->form->addQuickField('Field 2', $field2, 300);
        $this->form->addQuickFields('Field 3', array($field3, new TLabel('Field 4'), $field4));
        $this->form->addQuickField('Field 5', $field5, 100);
        $this->form->addQuickField('Field 6', $field6, 120);
        
        // add the fields inside the form page 2
        $this->form->appendPage('Page 2');
        $this->form->addQuickField('Field 7', $field7, 260);
        $this->form->addQuickField('Field 8', $field8, 120);
        $this->form->addQuickField('Field 9', $field9, 120);
        $this->form->addQuickField('Field 10', $field10, 120);
        
        $field3->setSize(100);
        $field4->setSize(100);
        $field10->setSize(200, 70);
        
        // define the form action 
        $this->form->addQuickAction('Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        // $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Get the post data
     */
    public function onSend($param)
    {
        $data = $this->form->getData();
        $this->form->setData($data);
        
        new TMessage('info', str_replace(',', '<br>', json_encode($data)));
    }
}
