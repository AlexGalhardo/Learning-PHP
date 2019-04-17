<?php
/**
 * FormDBSortView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormDBSortView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Sort DB List'));
        
        $list1 = new TDBSortList('list1', 'samples', 'Customer', 'id', '{name} (#{id})', 'id');
        $list2 = new TSortList('list2');
        
        $list1->setSize(200, 200);
        $list2->setSize(200, 200);
        
        $list1->connectTo($list2);
        $list2->connectTo($list1);
        
        $this->form->addFields([$list1, $list2]);
        $this->form->addAction( 'Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Send data
     */
    public function onSend($param)
    {
        // get form data
        $data = $this->form->getData();
        
        // put the data back to the form
        $this->form->setData($data);
        
        // creates a string with the form element's values
        $message = 'List 1: '  . implode(',', $data->list1) . '<br>';
        $message.= 'List 2 : ' . implode(',', $data->list2) . '<br>';
        
        // show the message
        new TMessage('info', $message);
    }
}
