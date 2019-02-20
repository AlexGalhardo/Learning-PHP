<?php
/**
 * CompleteFormDataGridView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CompleteFormDataGridView extends TPage
{
    private $form;      // registration form
    private $datagrid;  // listing
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // create the form
        $this->form = new BootstrapFormBuilder('form_categories');
        $this->form->setFormTitle(_t('Manual Form/DataGrid'));
        
        // create the form fields
        $id     = new TEntry('id');
        $name   = new TEntry('name');
        
        // add the fields in the form
        $this->form->addFields( [new TLabel('ID')],    [$id] );
        $this->form->addFields( [new TLabel('Name', 'red')],  [$name] );
        
        $name->addValidation('Name', new TRequiredValidator);
        
        // define the form actions
        $this->form->addAction( 'Save',  new TAction([$this, 'onSave']), 'fa:save green');
        $this->form->addAction( 'Clear', new TAction([$this, 'onClear']), 'fa:eraser red');
        
        // id not editable
        $id->setEditable(FALSE);
        
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->width = '100%';
        
        // add the columns
        $col_id    = new TDataGridColumn('id', 'Id', 'right', '10%');
        $col_name  = new TDataGridColumn('name', 'Name', 'left', '90%');
        
        $this->datagrid->addColumn($col_id);
        $this->datagrid->addColumn($col_name);
        
        $col_id->setAction( new TAction([$this, 'onReload']),   ['order' => 'id']);
        $col_name->setAction( new TAction([$this, 'onReload']), ['order' => 'name']);
        
        // add the actions
        $action1 = new TDataGridAction([$this, 'onEdit']);
        $action1->setLabel('Edit');
        $action1->setImage('fa:edit blue');
        $action1->setFields(['id']);
        $this->datagrid->addAction($action1);
        
        $action2 = new TDataGridAction([$this, 'onDelete']);
        $action2->setLabel('Delete');
        $action2->setImage('fa:trash red');
        $action2->setFields(['id']);
        $this->datagrid->addAction($action2);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // wrap objects
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        $vbox->add(TPanelGroup::pack('', $this->datagrid));
        
        // add the box in the page
        parent::add($vbox);
    }
    
    /**
     * method onReload()
     * Load the datagrid with the database objects
     */
    function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            $order    = isset($param['order']) ? $param['order'] : 'id';
            // load the objects according to criteria
            $categories = Category::orderBy($order)->load();
            
            $this->datagrid->clear();
            if ($categories)
            {
                // iterate the collection of active records
                foreach ($categories as $category)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($category);
                }
            }
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
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
            
            // get the form data into an active record Category
            $category = $this->form->getData('Category');
            
            // stores the object
            $category->store();
            
            // close the transaction
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', 'Record saved');
            
            // reload the listing
            $this->onReload();
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * Clear form
     */
    public function onClear()
    {
        $this->form->clear( true );
    }
    
    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button
     */
    function onEdit($param)
    {
        try
        {
            if (isset($param['id']))
            {
                // get the parameter e exibe mensagem
                $key = $param['id'];
                
                // open a transaction with database 'samples'
                TTransaction::open('samples');
                
                // instantiates object Category
                $category = new Category($key);
                
                // lança os data do category no form
                $this->form->setData($category);
                
                // close the transaction
                TTransaction::close();
                $this->onReload();
            }
            else
            {
                $this->form->clear( true );
            }
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * method onDelete()
     * executed whenever the user clicks at the delete button
     * Ask if the user really wants to delete the record
     */
    function onDelete($param)
    {
        // define the delete action
        $action = new TAction([$this, 'Delete']);
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion('Do you really want to delete ?', $action);
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
            $key  =$param['id'];
            
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            // instantiates object Category
            $category = new Category($key);
            
            // deletes the object from the database
            $category->delete();
            
            // close the transaction
            TTransaction::close();
            
            // reload the listing
            $this->onReload( $param );
            // shows the success message
            new TMessage('info', "Record Deleted");
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * method show()
     * Shows the page e seu conteúdo
     */
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
