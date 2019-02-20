<?php
/**
 * FormValidationView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormValidationView extends TPage
{
    private $form;
    
    /**
     * Page constructor
     */
    function __construct()
    {
        parent::__construct();
        
        // create the form
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Form validation'));
        
        // create the form fields
        $field1 = new TEntry('field1');
        $field2 = new TEntry('field2');
        $field3 = new TEntry('field3');
        $field4 = new TEntry('field4');
        $field5 = new TEntry('field5');
        $field6 = new TEntry('field6');
        $field7 = new TEntry('field7');
        
        // adjust grid layout columns
        $this->form->setColumnClasses(2, ['col-sm-4', 'col-sm-8']);
        
        // add the form fields
        $this->form->addFields( [new TLabel('1. Min length validator (3):')],  [$field1] );
        $this->form->addFields( [new TLabel('2. Max length validator (20):')], [$field2] );
        $this->form->addFields( [new TLabel('3. Min value validator (1):')],   [$field3] );
        $this->form->addFields( [new TLabel('4. Max value validator (10):')],  [$field4] );
        $this->form->addFields( [new TLabel('5. Required validator:')],        [$field5] );
        $this->form->addFields( [new TLabel('6. Email validator:')],           [$field6] );
        $this->form->addFields( [new TLabel('7. Numeric validator:')],         [$field7] );
        
        // add field validation
        $field1->addValidation('Field 1', new TMinLengthValidator, array(3)); // cannot be less the 3 characters
        $field2->addValidation('Field 2', new TMaxLengthValidator, array(20)); // cannot be greater the 20 characters
        $field3->addValidation('Field 3', new TMinValueValidator, array(1)); // cannot be less the 1
        $field4->addValidation('Field 4', new TMaxValueValidator, array(10)); // cannot be greater the 10
        $field5->addValidation('Field 5', new TRequiredValidator); // required field
        $field6->addValidation('Field 6', new TEmailValidator); // email field
        $field6->addValidation('Field 6', new TRequiredValidator); // email field
        $field7->addValidation('Field 7', new TNumericValidator); // numeric field
        
        $this->form->addAction('Send', new TAction(array($this, 'onSend')), 'fa:save green');
        
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
        try
        {
            $data = $this->form->getData(); // get form data
            
            // run form validation
            $this->form->validate();
            
            // creates a string with the form element's values
            $message = 'Field 1 : ' . $data->field1 . '<br>';
            $message.= 'Field 2 : ' . $data->field2 . '<br>';
            $message.= 'Field 3 : ' . $data->field3 . '<br>';
            $message.= 'Field 4 : ' . $data->field4 . '<br>';
            $message.= 'Field 5 : ' . $data->field5 . '<br>';
            $message.= 'Field 6 : ' . $data->field6 . '<br>';
            $message.= 'Field 7 : ' . $data->field7 . '<br>';
            
            // show the message
            new TMessage('info', $message);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
