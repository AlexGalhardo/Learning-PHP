<?php
/**
 * FormExpanderView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormExpanderView extends TPage
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
        $this->form->setFormTitle(_t('Expander'));
        
        // create the form fields
        $id          = new TEntry('id');
        $description = new TEntry('description');
        $input       = new TEntry('input');
         
        $subfield1 = new TEntry('subfield1');
        $subfield2 = new TEntry('subfield2');
        
        $expander = new TExpander('Click here to open!');
        $expander->setButtonProperty('class', 'btn btn-info btn-sm');
        
        $subtable = new TTable;
        $subtable->style = 'padding:5px';
        $expander->add($subtable);
        $subtable->addRowSet( new TLabel('Subfield1'), $subfield1 );
        $subtable->addRowSet( new TLabel('Subfield2'), $subfield2 );
        // add fields logically to the form
        $this->form->addField($subfield1);
        $this->form->addField($subfield2);
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Id')],    [$id] );
        $this->form->addFields( [new TLabel('Description')], [$description] );
        $this->form->addFields( [new TLabel('Another fields')], [$expander] );
        $this->form->addFields( [new TLabel('Input')], [$input] );
        
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
        $message = 'Id: '           . $data->id . '<br>';
        $message.= 'Description : ' . $data->description . '<br>';
        $message.= 'Subfield1 : '   . $data->subfield1 . '<br>';
        $message.= 'Subfield2 : '   . $data->subfield2 . '<br>';
        $message.= 'Input : '       . $data->input . '<br>';
        
        // show the message
        new TMessage('info', $message);
    }
}
?>