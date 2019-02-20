<?php
/**
 * FormDBAutoSelectionView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormDBAutoSelectionView extends TPage
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
        $this->form->setFormTitle(_t('Automatic database selections'));
        
        // create the form fields (name, database, model, key, value)
        $radio    = new TDBRadioGroup('radio', 'samples', 'Category', 'id', 'name');
        $radio2   = new TDBRadioGroup('radio2','samples', 'Category', 'id', '{id} - {name}');
        $check    = new TDBCheckGroup('check', 'samples', 'Category', 'id', 'name');
        $check2   = new TDBCheckGroup('check2','samples', 'Category', 'id', '{id} - {name}');
        $combo    = new TDBCombo('combo', 'samples', 'Category', 'id', 'name');
        $combo2   = new TDBCombo('combo2', 'samples', 'Category', 'id', 'name');
        $select   = new TDBSelect('select', 'samples', 'Category', 'id', 'name');
        $search   = new TDBMultiSearch('search', 'samples', 'Category', 'id', 'name');
        $unique   = new TDBUniqueSearch('unique', 'samples', 'City', 'id', 'name');
        $autocomp = new TDBEntry('autocomplete', 'samples', 'Category', 'name');
        
        // adjust grid layout columns
        $this->form->setColumnClasses(2, ['col-sm-4', 'col-sm-8']);
        
        // add the fields to the form
        $this->form->addFields( [new TLabel('TDBRadioGroup:')],  [$radio] );
        $this->form->addFields( [new TLabel('TDBCheckGroup:')],  [$check] );
        $this->form->addFields( [new TLabel('TDBRadioGroup (use button):')],  [$radio2] );
        $this->form->addFields( [new TLabel('TDBCheckGroup (use button):')],  [$check2] );
        $this->form->addFields( [new TLabel('TDBCombo:')],       [$combo] );
        $this->form->addFields( [new TLabel('TDBCombo (with search):')],   [$combo2] );
        $this->form->addFields( [new TLabel('TDBSelect:')],      [$select] );
        $this->form->addFields( [new TLabel('TDBMultiSearch:')], [$search] );
        $this->form->addFields( [new TLabel('TDBUniqueSearch:')],[$unique] );
        $this->form->addFields( [new TLabel('TDBEntry:')], [$autocomp] );
        
        // multisearch specific options
        $search->setMinLength(1);
        $unique->setMinLength(1);
        
        $search->setMask('{name} ({id})');
        $unique->setMask('({id}) <b>{name}</b> - {state->name}');
        $search->setOperator('like');
        
        // default data:
        $radio->setValue(2);
        $radio2->setValue(2);
        $check->setValue(array(1,3));
        $check2->setValue(array(1,3));
        $combo->setValue(2);
        $combo2->setValue(2);
        $select->setValue(array(1,2));
        $search->setValue(array(1,2));
        $unique->setValue(2);
        
        // another properties
        $radio->setLayout('horizontal');
        $check->setLayout('horizontal');
        $radio2->setLayout('horizontal');
        $check2->setLayout('horizontal');
        $radio2->setUseButton();
        $check2->setUseButton();
        $combo->setSize('100%');
        $combo2->setSize('100%');
        $combo2->enableSearch();
        $select->setSize('100%',100);
        $search->setSize('100%',70);
        $unique->setSize('100%');
        $autocomp->setSize('100%');
        
        $this->form->addAction('Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
        
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
        $data = $this->form->getData(); // optional parameter: active record class
        
        // put the data back to the form
        $this->form->setData($data);
        
        // creates a string with the form element's values
        $message = 'Radio : ' . $data->radio . '<br>';
        $message.= 'Check : ' . print_r($data->check, TRUE) . '<br>';
        $message.= 'Radio (button) : ' . $data->radio2 . '<br>';
        $message.= 'Check (button) : ' . print_r($data->check2, TRUE) . '<br>';
        $message.= 'Combo : ' . $data->combo . '<br>';
        $message.= 'Combo2 : ' . $data->combo2 . '<br>';
        $message.= 'Select : ' . print_r($data->select, TRUE) . '<br>';
        $message.= 'Search : ' . print_r($data->search, TRUE) . '<br>';
        $message.= 'Unique: '. print_r($data->unique, TRUE) . '<br>';
        $message.= 'Autocomplete: ' . $data->autocomplete;
        
        // show the message
        new TMessage('info', $message);
    }
}
