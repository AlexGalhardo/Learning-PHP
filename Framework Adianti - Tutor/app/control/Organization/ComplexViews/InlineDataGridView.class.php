<?php
/**
 * InlineDataGridView Listing
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class InlineDataGridView extends TPage
{
    private $datagrid; // listing
    private $pageNavigation;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->disableDefaultClick();
        
        // creates the datagrid columns
        $id      = new TDataGridColumn('id', 'id', 'right', '20%');
        $name    = new TDataGridColumn('name', 'Name', 'left', '40%');
        $address = new TDataGridColumn('address', 'Address', 'left', '40%');

        // creates the datagrid actions
        $order1 = new TAction(array($this, 'onReload'));
        $order2 = new TAction(array($this, 'onReload'));

        // define the ordering parameters
        $order1->setParameter('order', 'id');
        $order2->setParameter('order', 'name');

        // assign the ordering actions
        $id->setAction($order1);
        $name->setAction($order2);

        // add the columns to the DataGrid
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($name);
        $this->datagrid->addColumn($address);

        // creates a datagrid action
        $action1 = new TDataGridAction(array('CustomerFormView', 'onEdit'));
        $action1->setLabel('Edit');
        $action1->setImage('fa:edit blue');
        $action1->setField('id');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1);
        
        // creates the edit action
        $editaction = new TDataGridAction(array($this, 'onEdit'));
        $editaction->setField('id');
        $name->setEditAction($editaction);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // creates the page structure using a table
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack('', $this->datagrid, $this->pageNavigation));
        // add the table inside the page
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
            
            // creates a repository for Customer
            $repository = new TRepository('Customer');
            $limit = 10;
            
            // creates a criteria
            $criteria = new TCriteria;
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            // load the objects according to criteria
            $objects = $repository->load($criteria);
            
            $this->datagrid->clear();
            if ($objects)
            {
                // iterate the collection of active records
                foreach ($objects as $object)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count= $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
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
    
    function onEdit($param)
    {
        try
        {
            // get the parameter $key
            $field = $param['field'];
            $key   = $param['key'];
            $value = $param['value'];
            
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            // instantiates object Customer
            $customer = new Customer($key);
            $customer->{$field} = $value;
            $customer->store();
            
            // close the transaction
            TTransaction::close();
            
            // reload the listing
            $this->onReload($param);
            // shows the success message
            new TMessage('info', "Record Updated");
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
