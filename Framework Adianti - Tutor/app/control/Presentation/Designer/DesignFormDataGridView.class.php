<?php
/**
 * DesignFormDataGridView Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DesignFormDataGridView extends TPage
{
    private $form;
    private $datagrid;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // this forms use session
        new TSession;
        
        // creates the form
        $this->form = new TForm('form_Teste');
        
        try
        {
            // TUIBuilder object
            $ui = new TUIBuilder(500, 340);
            $ui->setController($this);
            $ui->setForm($this->form);
            
            // reads the xml form
            $ui->parseFile('app/forms/formdatagrid.form.xml');
            $this->datagrid = $ui->getWidget('datagrid1');
            
            // add the TUIBuilder panel inside the TForm object
            $this->form->add($ui);
            // define the form fields from the interface
            $this->form->setFields($ui->getFields());
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
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
            // get the form data into an object
            $object = $this->form->getData();
            
            $persisted_objects = TSession::getValue('persisted_objects');
            $persisted_objects[$object->id] = $object;
            TSession::setValue('persisted_objects', $persisted_objects);
            
            // shows the success message
            new TMessage('info', 'Record added');
            // reload the listing
            $this->onReload();
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
        }
    }

    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onEdit($param)
    {
        try
        {
            // get the parameter $key
            $key=$param['key'];
            $persisted_objects = TSession::getValue('persisted_objects');
            
            // instantiates object
            $object = $persisted_objects[$key];
            
            // fill the form with the object
            $this->form->setData($object);
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
        }
    }


    /**
     * method onDelete()
     * executed whenever the user clicks at the delete button
     * Ask if the user really wants to delete the record
     */
    function onDelete($param)
    {
        // get the parameter $key
        $key=$param['key'];
        
        // define two actions
        $action1 = new TAction(array($this, 'Delete'));
        
        // define the action parameters
        $action1->setParameter('key', $key);
        
        // shows a dialog to the user
        new TQuestion('Do you really want to delete ?', $action1);
    }
    
    /**
     * method Delete()
     * Delete a record
     */
    function Delete($param)
    {
        try
        {
            // get the parameter $key
            $key=$param['key'];
            
            $persisted_objects = TSession::getValue('persisted_objects');
            unset($persisted_objects[$key]);
            TSession::setValue('persisted_objects', $persisted_objects);
            
            // reload the listing
            $this->onReload();
            // shows the success message
            new TMessage('info', "Record Deleted");
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
        }
    }
    
    
    /**
     * method onReload()
     * Load the datagrid with the database objects
     */
    function onReload($param = NULL)
    {
        try
        {
            $this->datagrid->clear();
            $persisted_objects = TSession::getValue('persisted_objects');
            
            if ($persisted_objects)
            {
                // iterate the collection of active records
                foreach ($persisted_objects as $object)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
        }
    }
    
    /**
     * method show()
     * Shows the page
     */
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload();
        }
        parent::show();
    }
}
