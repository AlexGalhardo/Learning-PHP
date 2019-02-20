<?php
/**
 * FormVerticalBootstrapView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormVerticalBootstrapView extends TPage
{
    private $form;
    private $alertBox;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        $this->form = new BootstrapFormBuilder;
        
        // Fields by row
        $this->form->setFormTitle(_t('Bootstrap 1 column form'));
        
        // create the form fields
        $id          = new TEntry('id');
        $description = new TEntry('description');
        $date        = new TDate('date');
        $color       = new TColor('color');
        $list        = new TCombo('list');
        $text        = new TText('text');
        
        $combo_items = array();
        $combo_items['a'] ='Item a';
        $combo_items['b'] ='Item b';
        $combo_items['c'] ='Item c';
        
        $list->addItems($combo_items);
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Id', 'red')],    [$id])->layout = ['col-sm-12', 'col-sm-12' ];
        $this->form->addFields( [new TLabel('Description', 'red')], [$description] )->layout = ['col-sm-12', 'col-sm-12' ];
        $this->form->addFields( [new TLabel('Date')], [$date] )->layout = ['col-sm-12', 'col-sm-12' ];
        $this->form->addFields( [new TLabel('Color')], [$color] )->layout = ['col-sm-12', 'col-sm-12' ];
        $this->form->addFields( [new TLabel('List')], [$list] )->layout = ['col-sm-12', 'col-sm-12' ];
        $this->form->addFields( [new TLabel('Text')], [$text] )->layout = ['col-sm-12', 'col-sm-12' ];
        $text->setSize('100%', 50);
        
        $id->setSize('30%');
        $date->setSize('30%');
        $color->setSize('30%');
        $id->addValidation( 'Id', new TRequiredValidator);
        $description->addValidation( 'Description', new TRequiredValidator);
        
        // define the form action
        $btn = $this->form->addAction('Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o');
        $btn->class = 'btn btn-success';
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        // $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->alertBox);
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Send data
     */
    public function onSend($param)
    {
        try
        {
            $data = $this->form->getData(); // optional parameter: active record class
            
            $this->form->validate();
            
            // put the data back to the form
            $this->form->setData($data);
            
            // creates a string with the form element's values
            $message = 'Id: '           . $data->id . '<br>';
            $message.= 'Description : ' . $data->description . '<br>';
            $message.= 'Date1: '        . $data->date . '<br>';
            $message.= 'Color : '       . $data->color . '<br>';
            $message.= 'List : '        . $data->list . '<br>';
            $message.= 'Text : '        . $data->text . '<br>';
            
            // show the message
            new TMessage('info', $message);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
