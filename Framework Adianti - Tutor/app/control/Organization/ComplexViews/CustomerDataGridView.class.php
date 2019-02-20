<?php
/**
 * CustomerDataGridView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CustomerDataGridView extends TPage
{
    private $form;      // search form
    private $datagrid;  // listing
    private $pageNavigation;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page, the search form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_customer');
        $this->form->setFormTitle(_t('Customer list'));
        
        // create the form fields
        $name      = new TEntry('name');
        $city_name = new TEntry('city_name');
        
        $this->form->addFields( [new TLabel('Name')], [$name] );
        $this->form->addFields( [new TLabel('City')], [$city_name] );
        
        $name->setValue(TSession::getValue('customer_name'));
        $city_name->setValue(TSession::getValue('customer_city_name'));
        
        $this->form->addAction( 'Find', new TAction([$this, 'onSearch']), 'fa:search blue' );
        $this->form->addAction( 'CSV',  new TAction([$this, 'onExportCSV']), 'fa:table' );
        $this->form->addActionLink( 'New',  new TAction(['CustomerFormView', 'onEdit']), 'fa:plus green' );
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->enablePopover('Popover', 'Hi <b>{name}</b>, <br> that lives at <b>{city->name} - {city->state->name}</b>');
        
        // creates the datagrid columns
        $col_id      = new TDataGridColumn('id', 'Id', 'center', '10%');
        $col_name    = new TDataGridColumn('name', 'Name', 'left', '30%');
        $col_address = new TDataGridColumn('address', 'Address', 'left', '30%');
        $col_city    = new TDataGridColumn('{city->name} ({city->state->name})', 'City', 'left', '30%');
        
        $col_id->setAction(new TAction([$this, 'onReload']), ['order' => 'id']);
        $col_name->setAction(new TAction([$this, 'onReload']), ['order' => 'name']);
        $col_city->setAction(new TAction([$this, 'onReload']), ['order' => 'city->name']);
        
        $this->datagrid->addColumn($col_id);
        $this->datagrid->addColumn($col_name);
        $this->datagrid->addColumn($col_address);
        $this->datagrid->addColumn($col_city);
        
        // creates two datagrid actions
        $action1 = new TDataGridAction(['CustomerFormView', 'onEdit']);
        $action1->setLabel('Edit');
        $action1->setImage('fa:edit blue');
        $action1->setField('id');
        
        $action2 = new TDataGridAction([$this, 'onDelete']);
        $action2->setLabel('Delete');
        $action2->setImage('fa:trash red');
        $action2->setField('id');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // creates the page structure using a vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        $vbox->add(TPanelGroup::pack('', $this->datagrid, $this->pageNavigation));
        
        // add the box inside the page
        parent::add($vbox);
    }
    
    /**
     * method onSearch()
     * Register the filter in the session when the user performs a search
     */
    function onSearch()
    {
        // get the search form data
        $data = $this->form->getData();
        
        // check if the user has filled the form
        if (isset($data->name) AND ($data->name))
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('name', 'like', "{$data->name}%");
            
            // stores the filter in the session
            TSession::setValue('customer_filter1', $filter);
            TSession::setValue('customer_name',   $data->name);
            
        }
        else
        {
            TSession::setValue('customer_filter1', NULL);
            TSession::setValue('customer_name',   '');
        }
        
        
        // check if the user has filled the form
        if ($data->city_name)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('(SELECT name from city WHERE id=customer.city_id)', 'like', "{$data->city_name}%");
            
            // stores the filter in the session
            TSession::setValue('customer_filter2', $filter);
            TSession::setValue('customer_city_name', $data->city_name);
        }
        else
        {
            TSession::setValue('customer_filter2', NULL);
            TSession::setValue('customer_city_name', '');
        }
        
        // fill the form with data again
        $this->form->setData($data);
        
        $param = [];
        $param['offset']    =0;
        $param['first_page']=1;
        $this->onReload($param);
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
            
            $newparam = $param; // define new parameters
            if (isset($newparam['order']) AND $newparam['order'] == 'city->name')
            {
                $newparam['order'] = '(select name from city where city_id = id)';
            }
            
            // default order
            if (empty($newparam['order']))
            {
                $newparam['order'] = 'id';
                $newparam['direction'] = 'asc';
            }
            
            $criteria->setProperties($newparam); // order, offset
            $criteria->setProperty('limit', $limit);
            
            if (TSession::getValue('customer_filter1'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('customer_filter1'));
            }
            
            if (TSession::getValue('customer_filter2'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('customer_filter2'));
            }
            
            // load the objects according to criteria
            $customers = $repository->load($criteria, FALSE);
            $this->datagrid->clear();
            if ($customers)
            {
                foreach ($customers as $customer)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($customer);
                }
            }
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count= $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            $this->pageNavigation->enableCounters();
            
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
     * Export to CSV
     */
    function onExportCSV()
    {
        $this->onSearch();

        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            // creates a repository for Customer
            $repository = new TRepository('Customer');
            
            // creates a criteria
            $criteria = new TCriteria;
            
            if (TSession::getValue('customer_filter1'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('customer_filter1'));
            }
            
            if (TSession::getValue('customer_filter2'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('customer_filter2'));
            }
            
            $csv = '';
            // load the objects according to criteria
            $customers = $repository->load($criteria, false);
            if ($customers)
            {
                foreach ($customers as $customer)
                {
                    $csv .= $customer->id.';'.
                            $customer->name.';'.
                            $customer->city_name."\n";
                }
                file_put_contents('app/output/customers.csv', $csv);
                TPage::openFile('app/output/customers.csv');
            }
            // close the transaction
            TTransaction::close();
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
     * Ask before deletion
     */
    public static function onDelete($param)
    {
        // define the delete action
        $action = new TAction([__CLASS__, 'Delete']);
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }
    
    /**
     * Delete a record
     */
    public static function Delete($param)
    {
        try
        {
            $key=$param['key']; // get the parameter $key
            TTransaction::open('samples'); // open a transaction with database
            $object = new Customer($key, FALSE); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            
            $pos_action = new TAction([__CLASS__, 'onReload']);
            new TMessage('info', AdiantiCoreTranslator::translate('Record deleted'), $pos_action); // success message
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
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
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
