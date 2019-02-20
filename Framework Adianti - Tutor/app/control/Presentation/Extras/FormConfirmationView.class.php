<?php
/**
 * FormConfirmationView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormConfirmationView extends TPage
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
        $this->form->setFormTitle(_t('Form confirmation'));
        
        // create the form fields
        $id          = new TEntry('id');
        $description = new TEntry('description');
        $date        = new TDate('date');
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Id')],    [$id] );
        $this->form->addFields( [new TLabel('Description')], [$description] );
        $this->form->addFields( [new TLabel('Date')], [$date] );
        
        $date->setSize(120);
        
        // define the form action 
        $this->form->addAction('Save', new TAction(array($this, 'onSave')), 'ico_save.png');
        
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
        $data = $this->form->getData();
        
        $this->form->setData($data);
        
        // collect form data and store in the session
        TSession::setValue(__CLASS__.'_data', $data);
        
        // form asking login and password
        $form = new TQuickForm('input_form');
        $form->style = 'padding:20px';
        
        $login = new TEntry('login');
        $pass  = new TPassword('password');
        
        $form->addQuickField('Login (type "admin")', $login);
        $form->addQuickField('Password (type "admin")', $pass);
        
        $form->addQuickAction('Confirm', new TAction(array($this, 'onConfirm')), 'fa:check blue');
        
        // show the input dialog
        new TInputDialog('Confirmation dialog', $form);
    }
    
    public function onConfirm($param)
    {
        $this->form->setData( TSession::getValue(__CLASS__.'_data'));
        
        if ($param['login'] == 'admin' AND $param['password'] == 'admin')
        {
            new TMessage('info', 'OK, you got it: ' . json_encode(TSession::getValue(__CLASS__.'_data')));
        }
    }
}
