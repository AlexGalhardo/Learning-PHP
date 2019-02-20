<?php
/**
 * CompleteFormView Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CompleteFormView extends TPage
{
    private $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_City');
        $this->form->setFormTitle(_t('Manual form'));
        
        // create the form fields
        $id       = new TEntry('id');
        $name     = new TEntry('name');
        $state_id = new TDBCombo('state_id', 'samples', 'State', 'id', 'name');
        $id->setEditable(FALSE);
        
        // add the form fields
        $this->form->addFields( [new TLabel('ID')],    [$id] );
        $this->form->addFields( [new TLabel('Name', 'red')],  [$name] );
        $this->form->addFields( [new TLabel('State', 'red')], [$state_id] );
        
        $name->addValidation('Name', new TRequiredValidator);
        $state_id->addValidation('State', new TRequiredValidator);
        
        // define the form action
        $this->form->addAction('Save', new TAction([$this, 'onSave']), 'fa:save green');
        $this->form->addAction('Clear',  new TAction([$this, 'onClear']), 'fa:eraser red');
        $this->form->addActionLink('Listing',  new TAction(['CompleteDataGridView', 'onReload']), 'fa:table blue');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }

    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    function onSave()
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            $this->form->validate(); // run form validation
            
            $data = $this->form->getData(); // get form data as array
            
            $object = new City;  // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            TTransaction::close();  // close the transaction
            
            // shows the success message
            new TMessage('info', 'Record saved');
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Clear form
     */
    public function onClear()
    {
        $this->form->clear( TRUE );
    }
    
    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onEdit($param)
    {
        try
        {
            if (isset($param['id']))
            {
                $key = $param['id'];  // get the parameter
                TTransaction::open('samples');   // open a transaction with database 'samples'
                $object = new City($key);        // instantiates object City
                $this->form->setData($object);   // fill the form with the active record data
                TTransaction::close();           // close the transaction
            }
            else
            {
                $this->form->clear( true );
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}
