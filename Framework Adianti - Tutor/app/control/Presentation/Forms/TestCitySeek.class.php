<?php
/**
 * City Seek
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TestCitySeek extends TWindow
{
    private $form;      // form
    private $datagrid;  // datagrid
    private $pageNavigation;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page, the search form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        parent::setSize(700, 500);
        parent::setTitle('Search record');
        new TSession;
        
        // creates the form
        $this->form = new TQuickForm('form_search_city');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Cities');
        
        // create the form fields
        $name   = new TEntry('name');
        $name->setValue(TSession::getValue('city_name'));
        
        // add the form fields
        $this->form->addQuickField('Name', $name,  200);

        // define the form action
        $this->form->addQuickAction('Find', new TAction(array($this, 'onSearch')), 'ico_find.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(230);
        $this->datagrid->enablePopover('Title', 'Name {name}');
        
        // creates the datagrid columns
        $this->datagrid->addQuickColumn('Id', 'id', 'right', 40);
        $this->datagrid->addQuickColumn('Name', 'name', 'left', 340);

        // creates two datagrid actions
        $this->datagrid->addQuickAction('Select', new TDataGridAction(array($this, 'onSelect')), 'id', 'ico_apply.png');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // creates a container
        $container = new TVBox;
        $container->style = 'width: 100%; padding: 10px';
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        // add the container inside the page
        parent::add($container);
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
        if (isset($data->name))
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('name', 'like', "%{$data->name}%");
            
            // stores the filter in the session
            TSession::setValue('city_filter', $filter);
            TSession::setValue('city_name',   $data->name);
            
            // fill the form with data again
            $this->form->setData($data);
        }
        
        // redefine the parameters for reload method
        $param=array();
        $param['offset']    =0;
        $param['first_page']=1;
        $this->onReload($param);
    }
    
    /**
     * Load the datagrid with the database objects
     */
    function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            // creates a repository for City
            $repository = new TRepository('City');
            $limit = 10;
            // creates a criteria
            $criteria = new TCriteria;
            
            // default order
            if (!isset($param['order']))
            {
                $param['order'] = 'id';
                $param['direction'] = 'asc';
            }
            
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            if (TSession::getValue('city_filter'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('city_filter'));
            }
            
            // load the objects according to the criteria
            $cities = $repository->load($criteria);
            $this->datagrid->clear();
            if ($cities)
            {
                foreach ($cities as $city)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($city);
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
    
    /**
     * Executed when the user chooses the record
     */
    public function onSelect($param)
    {
        try
        {
            $key = $param['key'];
            TTransaction::open('samples');
            
            // load the active record
            $city = new City($key);
            
            // closes the transaction
            TTransaction::close();
            
            $object = new StdClass;
            $object->city_id1   = $city->id;
            $object->city_name1 = $city->name;
            
            TForm::sendData('form_seek_sample', $object);
            parent::closeWindow(); // closes the window
        }
        catch (Exception $e) // em caso de exceção
        {
            // clear fields
            $object = new StdClass;
            $object->city_id1   = '';
            $object->city_name1 = '';
            TForm::sendData('form_seek_sample', $object);
            
            // undo pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * Shows the page
     */
    function show()
    {
        // if the datagrid was not loaded yet
        if (!$this->loaded)
        {
            $this->onReload();
        }
        parent::show();
    }
}
