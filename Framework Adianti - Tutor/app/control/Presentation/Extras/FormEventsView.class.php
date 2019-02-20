<?php
/**
 * FormEventsView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormEventsView extends TPage
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
        $this->form->setFormTitle(_t('Form events'));
        
        // create the form fields
        $entry      = new TEntry('entry');
        $radio      = new TRadioGroup('radio');
        $check      = new TCheckGroup('check');
        $combo      = new TCombo('combo');
        $select     = new TSelect('select');
        $search     = new TMultiSearch('search');
        $unique     = new TUniqueSearch('unique');
        $multientry = new TMultiEntry('multientry');
        $autocomp   = new TEntry('autocomplete');
        $date       = new TDate('date');
        $file       = new TFile('file');
        $text       = new TText('text');
        $spinner    = new TSpinner('spinner');
        $result     = new THtmlEditor('result');
        
        $entry->placeholder = 'start typing something here';
        
        $radio->setUseButton();
        $check->setUseButton();
        $spinner->setRange(1,100,1);
        
        $entry->setExitAction(new TAction(array($this, 'onExitAction')));
        $radio->setChangeAction(new TAction(array($this, 'onChangeAction')));
        // $radio->setChangeFunction('alert(this.value)');
        $check->setChangeAction(new TAction(array($this, 'onChangeAction')));
        // $check->setChangeFunction('alert(this.value)');
        $combo->setChangeAction(new TAction(array($this, 'onChangeAction')));
        // $combo->setChangeFunction('alert(this.value)');
        $select->setChangeAction(new TAction(array($this, 'onChangeAction')));
        // $select->setChangeFunction('alert(this.value)');
        $search->setChangeAction(new TAction(array($this, 'onChangeAction')));
        $unique->setChangeAction(new TAction(array($this, 'onChangeAction')));
        $multientry->setChangeAction(new TAction(array($this, 'onChangeAction')));
        $autocomp->setExitAction(new TAction(array($this, 'onChangeAction')));
        $date->setExitAction(new TAction(array($this, 'onChangeAction')));
        $file->setCompleteAction(new TAction(array($this, 'onChangeAction')));
        $text->setExitAction(new TAction(array($this, 'onChangeAction')));
        $spinner->setExitAction(new TAction(array($this, 'onChangeAction')));
        
        $entry->setTip('Type: a,c');
        $radio->setLayout('horizontal');
        $check->setLayout('horizontal');
        $entry->setSize(400);
        $autocomp->setSize(400);
        $file->setSize(400);
        $combo->setSize(100);
        $select->setSize(400, 70);
        $search->setSize(400, 40);
        $unique->setSize(400, 40);
        $text->setSize(400,40);
        $result->setSize(500,200);
        $multientry->setSize(300,70);
        
        $items = array();
        $items['a'] ='Item a';
        $items['b'] ='Item b';
        $items['c'] ='Item c';
        
        $radio->addItems($items);
        $check->addItems($items);
        $combo->addItems($items);
        $select->addItems($items);
        $search->addItems($items);
        $unique->addItems($items);
        $autocomp->setCompletion( array_values( $items ));
        
        foreach ($radio->getLabels() as $key => $label)
        {
            $label->setTip("Radio $key");
        }
        foreach ($check->getLabels() as $key => $label)
        {
            $label->setTip("Check $key");
        }
        
        // define default values
        $search->setMinLength(3);
        
        // add the fields to the table
        $this->form->addFields( [new TLabel('Entry:')],         [$entry] );
        $this->form->addFields( [new TLabel('TRadioGroup:')],   [$radio] );
        $this->form->addFields( [new TLabel('TCheckGroup:')],   [$check] );
        $this->form->addFields( [new TLabel('TCombo:')],        [$combo] );
        $this->form->addFields( [new TLabel('TSelect:')],       [$select] );
        $this->form->addFields( [new TLabel('TMultiSearch:')],  [$search] );
        $this->form->addFields( [new TLabel('TUniqueSearch:')], [$unique] );
        $this->form->addFields( [new TLabel('TMultiEntry:')],   [$multientry] );
        $this->form->addFields( [new TLabel('Autocomplete:')],  [$autocomp] );
        $this->form->addFields( [new TLabel('Date:')],          [$date] );
        $this->form->addFields( [new TLabel('Text:')],          [$text] );
        $this->form->addFields( [new TLabel('Spinner:')],       [$spinner] );
        $this->form->addFields( [new TLabel('File:')],          [$file] );
        $this->form->addFields( [new TLabel('Result:')],        [$result] );
        
        parent::add($this->form);
    }
    
    public static function onExitAction($param)
    {
        $value = $param['entry'];
        $obj = new stdClass;
        $obj->radio  = 'a';
        $obj->check  = ['a','c']; // works with comma separated strings also
        $obj->combo  = 'a';
        $obj->search = ['a','c']; // works with comma separated strings also
        $obj->unique = 'b';
        $obj->multientry = ['aaa','bbb','ccc']; // works with comma separated strings also
        $obj->select = ['a','c']; // works with comma separated strings also
        $obj->autocomplete = 'abc';
        $obj->date = date('Y-m-d');
        $obj->text = 'abc';
        $obj->spinner = '30';
        
        TForm::sendData('my_form', $obj);
    }
    
    public static function onChangeAction($param)
    {
        unset($param['result']);
        
        $output = '';
        foreach ($param as $key => $value)
        {
            if (is_string($value))
            {
                $output .= "<b>$key</b> => $value <br>";
            }
            else
            {
                $svalue = json_encode($value);
                $output .= "<b>$key</b> => $svalue <br>";
            }
        }
        
        $obj = new stdClass;
        $obj->result = $output;
        TForm::sendData('my_form', $obj);
    }
}
