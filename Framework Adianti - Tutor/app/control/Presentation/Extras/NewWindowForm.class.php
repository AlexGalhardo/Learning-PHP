<?php
/**
 * NewWindowForm
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class NewWindowForm extends TWindow
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        parent::setSize(570, 200);
        parent::setTitle('Form inside window');
        
        // create the form
        $this->form = new BootstrapFormWrapper(new TQuickForm);
        $this->form->setFormTitle('Quick form');
        $this->form->style = 'width:90%; padding-top:20px';
        
        // create the form fields
        $code = new TEntry('code');
        $name = new TEntry('name');
        
        // add the fields inside the form
        $this->form->addQuickField('Code', $code, '30%');
        $this->form->addQuickField('Name', $name, '70%');
        
        // define the form action 
        $this->form->addQuickAction('Save', new TAction(array($this, 'onSave')), 'fa:check-circle-o green');
        
        parent::add($this->form);
    }
    
    public function onSave($param)
    {
        $data = $this->form->getData();
        $this->form->setData($data); // put the data back to the form
        
        $objects = TSession::getValue('session_contacts');
        $objects[ $data->code ] = $data;
        
        TSession::setValue('session_contacts', $objects);
        
        // show the message
        new TMessage('info', 'Record added', new TAction(array('DatagridWindowForm', 'onReload')));
    }
    
    public function onLoad()
    {
    }
}
