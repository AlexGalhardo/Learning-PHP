<?php
/**
 * MultiStepMultiForm2View
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MultiStepMultiForm2View extends TPage
{
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        

        // creates the form
        $this->form = new BootstrapFormBuilder('form_account');
        $this->form->setFormTitle('Personal details');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9'] );
        
        // create the form fields
        $email        = new TEntry('email');
        $first_name   = new TEntry('first_name');
        $last_name    = new TEntry('last_name');
        $phone        = new TEntry('phone');
        $email->setEditable(FALSE);
        
        // add the fields
        $this->form->addFields(['Email'], [$email] );
        $this->form->addFields(['First name'], [$first_name] );
        $this->form->addFields(['Last name'], [$last_name] );
        $this->form->addFields(['Phone'], [$phone] );
        
        // validations
        $first_name->addValidation('First name', new TRequiredValidator);
        $last_name->addValidation('Last name', new TRequiredValidator);
        $phone->addValidation('Phone', new TRequiredValidator);

        // add a form action
        $this->form->addAction('Back', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');
        $this->form->addAction('Confirm', new TAction(array($this, 'onConfirm')), 'fa:check-circle-o green');
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'MultiStepMultiFormView'));
        $vbox->add($this->form);
        
        // add the form to the page
        parent::add($vbox);
    }
    
    /**
     * load the previous data
     */
    public function onLoadFromForm1($data)
    {
        $obj = new StdClass;
        $obj->email = $data['email'];
        $this->form->setData($obj);
    }
    
    /**
     * Load the previous form
     */
    public function onBackForm()
    {
        // Load another page
        AdiantiCoreApplication::loadPage('MultiStepMultiFormView', 'onLoadFromSession');
    }
    
    /**
     * confirmation screen
     */
    public function onConfirm()
    {
        try
        {
            $this->form->validate();
            $data = $this->form->getData();
            $this->form->setData($data);
            
            $form1_data = TSession::getValue('form_step1_data');
            $data->password = $form1_data->password;
            new TMessage('info', str_replace(',', '<br>', json_encode($data)));
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
