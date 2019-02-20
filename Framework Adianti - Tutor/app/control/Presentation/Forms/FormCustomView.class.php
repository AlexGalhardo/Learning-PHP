<?php
/**
 * FormCustomView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormCustomView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new TForm('customform');
        
        // creates the notebook
        $notebook = new BootstrapNotebookWrapper(new TNotebook);
        $this->form->add($notebook);
        
        // creates the containers for each notebook page
        $table1 = new TTable;
        $table2 = new TTable;
        
        $table1->width = '100%';
        $table2->width = '100%';
        
        $table1->style = 'padding: 10px';
        $table2->style = 'padding: 10px';
        
        // adds two pages in the notebook
        $notebook->appendPage('Page 1', $table1);
        $notebook->appendPage('Page 2', $table2);
        
        // create the form fields
        $field1  = new TEntry('field1');
        $field2  = new TEntry('field2');
        $field3  = new TDate('field3');
        $field4  = new TCombo('field4');
        $field5  = new TText('field5');
        
        $field1->setSize('30%');
        $field2->setSize('100%');
        $field3->setSize('100%');
        $field4->setSize('100%');
        $field5->setSize('100%', 70);
        
        $items = [ 'a' => 'Item a', 'b' => 'Item b', 'c' => 'Item c' ];
        $field4->addItems($items);
        
        // add rows for the fields
        $table1->addRowSet( new TLabel('Field 1'), $field1 );
        $table1->addRowSet( new TLabel('Field 2'), $field2 );
        $table1->addRowSet( new TLabel('Field 3'), $field3 );
        $table1->addRowSet( new TLabel('Field 4'), $field4 );
        
        $table2->addRowSet( new TLabel('Field 5') );
        $table2->addRowSet( $field5 );
        
        // creates the action button
        $button = new TButton('action1');
        $button->setAction(new TAction(array($this, 'onSend')), 'Send');
        $button->setImage('fa:check-circle-o green');
        
        // define wich are the form fields
        $this->form->setFields([$field1, $field2, $field3, $field4, $field5, $button]);
        
        $panel = new TPanelGroup(_t('Manual form'));
        $panel->add($this->form);
        $panel->addFooter($button);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($panel);
        
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
