<?php
/**
 * DesignFormView Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DesignFormView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new TForm;
        
        try
        {
            // UIBuilder object
            $ui = new TUIBuilder(500,300);
            $ui->setController($this);
            $ui->setForm($this->form);
            
            // reads the xml form
            $ui->parseFile('app/forms/sample.form.xml');
            
            // add the TUIBuilder panel inside the form
            $this->form->add($ui);
            
            // set the form fields from the interface
            $this->form->setFields($ui->getFields());
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    

    /**
     * method onView()
     * Executed whenever the user clicks at the save button
     */
    function onView()
    {
        try
        {
            $data = $this->form->getData(); // optional parameter: active record class
            
            // put the data back to the form
            $this->form->setData($data);
            
            $this->form->validate();
            
            // creates a string with the form element's values
            $message = 'ID : ' . $data->id . '<br>';
            $message.= 'Name : ' . $data->name . '<br>';
            $message.= 'Birthdate : ' . $data->birthdate . '<br>';
            $message.= 'Gender : ' . $data->gender . '<br>';
            $message.= 'Pets : ' . $data->pets . '<br>';
            $message.= 'Income : ' . $data->income . '<br>';
            $message.= 'Weight : ' . $data->weight . '<br>';
            $message.= 'Fashion : ' . implode(',', $data->fashion) . '<br>';  
            
            // show the message
            new TMessage('info', $message);
        }
        catch(Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>