<?php
/**
 * Multi Step 3
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MultiStepRegistration3View extends TPage
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
        
        // create the form fields
        $email        = new TEntry('email');
        $first_name   = new TEntry('first_name');
        $last_name    = new TEntry('last_name');
        $phone        = new TEntry('phone');
        
        // add the fields
        $this->form->addFields(['Email'], [$email] );
        $this->form->addFields(['First name'], [$first_name] );
        $this->form->addFields(['Last name'], [$last_name] );
        $this->form->addFields(['Phone'], [$phone] );
        
        // validations
        $email->addValidation('Email', new TEmailValidator);
        $first_name->addValidation('First name', new TRequiredValidator);
        $last_name->addValidation('Last name', new TRequiredValidator);
        $phone->addValidation('Phone', new TRequiredValidator);

        // add a form action
        $this->form->addAction('Back', new TAction(array($this, 'onBackForm')), 'fa:arrow-circle-o-left red');
        $this->form->addAction('Confirm', new TAction(array($this, 'onConfirm')), 'fa:check-circle-o green');
        
        $breadcrumb = new TBreadCrumb;
        $breadcrumb->setHomeController('MultiStepRegistration1View');
        $breadcrumb->addHome();
        $breadcrumb->addItem('Welcome');
        $breadcrumb->addItem('Selection');
        $breadcrumb->addItem('Complete information');
        $breadcrumb->addItem('Confirmation');
        $breadcrumb->select('Complete information');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add( $breadcrumb );
        $vbox->add( $this->form );
        parent::add($vbox);
    }
    
    /**
     * Load the previous form
     */
    public function onBackForm()
    {
        // Load another page
        AdiantiCoreApplication::loadPage('MultiStepRegistration2View');
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
            TSession::setValue('registration_data', (array) $data);
            
            AdiantiCoreApplication::loadPage('MultiStepRegistration4View');
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
