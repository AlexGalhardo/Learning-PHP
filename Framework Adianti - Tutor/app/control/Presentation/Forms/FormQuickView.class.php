<?php
/**
 * FormQuickView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormQuickView extends TPage
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
        $this->form = new TQuickForm;
        $this->form->class = 'tform';
        $this->form->setFormTitle('Quick Form');
        
        // create the form fields
        $id          = new TEntry('id');
        $description = new TEntry('description');
        $password    = new TPassword('password');
        $created     = new TDateTime('created');
        $expires     = new TDate('expires');
        $value       = new TEntry('value');
        $color       = new TColor('color');
        $weight      = new TSpinner('weight');
        $type        = new TCombo('type');
        $text        = new TText('text');
        
        $id->setEditable(FALSE);
        $created->setMask('dd/mm/yyyy hh:ii');
        $expires->setMask('dd/mm/yyyy');
        $created->setDatabaseMask('yyyy-mm-dd hh:ii');
        $expires->setDatabaseMask('yyyy-mm-dd');
        $value->setNumericMask(2, ',', '.', true);
        $value->setSize(145);
        $color->setSize(120);
        $created->setSize(120);
        $expires->setSize(120);
        $weight->setRange(1,100,0.1);
        $weight->setSize(130);
        $type->setSize(140);
        $type->addItems( [ 'a' => 'Type a', 'b' => 'Type b', 'c' => 'Type c'] );
        
        $created->setValue( date('Y-m-d H:i') );
        $expires->setValue( date('Y-m-d', strtotime("+1 days")) );
        $value->setValue(123.45);
        $weight->setValue(30);
        $color->setValue('#FF0000');
        $type->setValue('a');
        
        // add the fields inside the form
        $this->form->addQuickField($l0=new TLabel('Id'),    $id,    40);
        $this->form->addQuickField('Description', $description, 380);
        $this->form->addQuickField('Password', $password, 380);
        $this->form->addQuickFields('Created at', array($created, $l1=new TLabel('Expires at'), $expires));
        $this->form->addQuickFields('Value', array($value, $l2=new TLabel('Color'), $color));
        $this->form->addQuickFields('Weight', array($weight, $l3=new TLabel('Type'), $type));
        
        $description->placeholder = 'Description placeholder';
        $description->setTip('Tip for description');
        $l0->setFontColor('blue');
        $l1->setSize(80);
        $l2->setSize(80);
        $l3->setSize(80);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $cell = $row->addCell( $lbl=new TLabel('Division'));
        $cell->colspan = 2;
        $cell->style = 'height:30px; border-top: 1px solid gray;';
        $lbl->setFontColor('white');
        $this->form->addQuickField('Description', $text, 120);
        $text->setSize(380, 50);
        
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
     * Simulates an save button
     * Show the form content
     */
    public function onSend($param)
    {
        $data = $this->form->getData(); // optional parameter: active record class
        
        // put the data back to the form
        $this->form->setData($data);
        
        // creates a string with the form element's values
        $message = 'Id: '           . $data->id . '<br>';
        $message.= 'Description : ' . $data->description . '<br>';
        $message.= 'Password : '    . $data->password . '<br>';
        $message.= 'Created: '      . $data->created . '<br>';
        $message.= 'Expires: '      . $data->expires . '<br>';
        $message.= 'Value : '       . $data->value . '<br>';
        $message.= 'Color : '       . $data->color . '<br>';
        $message.= 'Weight : '      . $data->weight . '<br>';
        $message.= 'Type : '        . $data->type . '<br>';
        $message.= 'Text : '        . $data->text . '<br>';
        
        // show the message
        new TMessage('info', $message);
    }
}
