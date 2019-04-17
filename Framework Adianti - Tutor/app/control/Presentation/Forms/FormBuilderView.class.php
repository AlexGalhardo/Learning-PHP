<?php
/**
 * FormBuilderView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormBuilderView extends TPage
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
        $this->form->setFormTitle(_t('Bootstrap form'));
        
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
        $value->setSize('100%');
        $color->setSize('100%');
        $created->setSize('100%');
        $expires->setSize('100%');
        $weight->setRange(1,100,0.1);
        $weight->setSize('100%');
        $type->setSize('100%');
        $type->addItems( ['a' => 'Type a', 'b' => 'Type b', 'c' => 'Type c'] );
        
        $created->setValue( date('Y-m-d H:i') );
        $expires->setValue( date('Y-m-d', strtotime("+1 days")) );
        $value->setValue(123.45);
        $weight->setValue(30);
        $color->setValue('#FF0000');
        $type->setValue('a');
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Id')],          [$id]);
        $this->form->addFields( [new TLabel('Description')], [$description] );
        $this->form->addFields( [new TLabel('Password')],    [$password] );
        $this->form->addFields( [new TLabel('Created at')],  [$created], 
                                [new TLabel('Expires at')],  [$expires]);
        $this->form->addFields( [new TLabel('Value')],       [$value],
                                [new TLabel('Color')],       [$color]);
        $this->form->addFields( [new TLabel('Weight')],      [$weight],
                                [new TLabel('Type')],        [$type]);
        
        $description->placeholder = 'Description placeholder';
        $description->setTip('Tip for description');
        
        $label = new TLabel('Division', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields( [new TLabel('Description')], [$text] );
        $text->setSize('100%', 50);
        
        // define the form action 
        $this->form->addAction('Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
        $this->form->addHeaderAction('Send', new TAction(array($this, 'onSend')), 'fa:rocket orange');
        
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
    public function onSend($param)
    {
        $data = $this->form->getData();
        
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
