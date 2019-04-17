<?php
/**
 * FormSelectionBreakView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormSelectionBreakView extends TPage
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
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Selection breaks'));
        
        // create the form fields
        $radio    = new TRadioGroup('radio');
        $radio2   = new TRadioGroup('radio2');
        $check    = new TCheckGroup('check');
        $check2   = new TCheckGroup('check2');
        
        $radio->setLayout('horizontal');
        $radio2->setLayout('horizontal');
        $check->setLayout('horizontal');
        $check2->setLayout('horizontal');
        
        $radio2->setUseButton();
        $check2->setUseButton();
        
        $radio->setBreakItems(5);
        $radio2->setBreakItems(5);
        $check->setBreakItems(5);
        $check2->setBreakItems(5);
        
        $items = array();
        for ($n=1; $n<=20; $n++)
        {
            $items[$n] = $n;
        }
        
        $radio->addItems($items);
        $check->addItems($items);
        $radio2->addItems($items);
        $check2->addItems($items);
        
        foreach ($radio->getLabels() as $key => $label)
        {
            $label->setTip("Radio $key");
            $label->setSize(40);
        }
        foreach ($radio2->getLabels() as $key => $label)
        {
            $label->setTip("Radio $key");
            $label->setSize(40);
        }
        foreach ($check->getLabels() as $key => $label)
        {
            $label->setTip("Check $key");
            $label->setSize(40);
        }
        foreach ($check2->getLabels() as $key => $label)
        {
            $label->setTip("Check $key");
            $label->setSize(40);
        }
        
        // add the fields to the table
        $this->form->addFields( [new TLabel('TRadioGroup:')], [$radio] );
        $this->form->addFields( [new TLabel('TCheckGroup:')], [$check] );
        $this->form->addFields( [new TLabel('TRadioGroup (use button):')], [$radio2] );
        $this->form->addFields( [new TLabel('TCheckGroup (use button):')], [$check2] );
        
        $this->form->addAction( 'Save', new TAction(array($this, 'onSave')), 'fa:save green');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Simulates an save button
     * Show the form content
     */
    public function onSave($param)
    {
        $data = $this->form->getData(); // optional parameter: active record class
        
        // put the data back to the form
        $this->form->setData($data);
        
        // creates a string with the form element's values
        $message = 'Radio : ' . $data->radio . '<br>';
        $message.= 'Check : ' . print_r($data->check, TRUE) . '<br>';
        $message.= 'Radio (button) : ' . $data->radio2 . '<br>';
        $message.= 'Check (button) : ' . print_r($data->check2, TRUE) . '<br>';
        
        // show the message
        new TMessage('info', $message);
    }
}
