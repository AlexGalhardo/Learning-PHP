<?php
/**
 * Item Seek
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ItemSeek extends TWindow
{
    private $form;      // form
    private $datagrid;  // datagrid
    private $pageNavigation;
    private $parentForm;
    private $loaded;
    
    /**
     * constructor method
     */
    public function __construct()
    {
        parent::__construct();
        parent::setSize(900, 500);
        parent::setTitle( _t('Items') );
        // creates the form
        $this->form = new TForm('form_item_Seek');
        // creates the table
        $table = new TTable;
        
        // add the table inside the form
        $this->form->add($table);
        
        // create the form fields
        $barcode = new TEntry('barcode');
        // keep the session value
        $barcode->setValue(TSession::getValue('test_item_barcode'));
        $barcode->setSize(400);
        // create a find button
        $find_button = new TButton('search');
        $find_button->setAction(new TAction(array($this, 'onSearch')), 'Search');
        $find_button->setImage('fa:search');
        
        $table->addRowSet(new TLabel(_t('Barcode')), $barcode, $find_button);
        
        // define wich are the form fields
        $this->form->setFields(array($barcode, $find_button));
        
        // create the datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        
        // create the datagrid columns
        $id      = new TDataGridColumn('id',       _t('Code'),    'right',  100);
        $barcode = new TDataGridColumn('barcode',  _t('Barcode'), 'left',   150);
        $title   = new TDataGridColumn('title',    _t('Title'),   'left',   500);
        
        $order1= new TAction(array($this, 'onReload'));
        $order2= new TAction(array($this, 'onReload'));
        
        $order1->setParameter('order', 'id');
        $order2->setParameter('order', 'barcode');
        
        // define the column actions
        $id->setAction($order1);
        $barcode->setAction($order2);
        
        // add the columns inside the datagrid
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($barcode);
        $this->datagrid->addColumn($title);
        
        // create one datagrid action
        $action1 = new TDataGridAction(array($this, 'onSelect'));
        $action1->setLabel('Selecionar');
        $action1->setUseButton(true);
        $action1->setImage('fa:check-circle-o green');
        $action1->setField('barcode');
        
        // add the action to the datagrid
        $this->datagrid->addAction($action1);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigator
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create a table for layout
        $table = new TTable;
        // create a row for the form
        $row = $table->addRow();
        $row->addCell($this->form);
        
        // create a row for the datagrid
        $row = $table->addRow();
        $row->addCell($this->datagrid);
        
        // create a row for the page navigator
        $row = $table->addRow();
        $row->addCell($this->pageNavigation);
        
        // add the table inside the page
        parent::add($table);
    }
    
    /**
     * Register a filter in the session
     */
    function onSearch()
    {
        // get the form data
        $data = $this->form->getData();
        // armazena o filtro na seção
        TSession::setValue('test_item_filter', NULL);
        TSession::setValue('test_item_barcode', '');
        
        // check if the user has filled the fields
        if (isset($data->barcode) AND ($data->barcode))
        {
            // cria um filtro pelo conteúdo digitado
            $filter = new TFilter('barcode', '=', "{$data->barcode}");
            
            // armazena o filtro na seção
            TSession::setValue('test_item_filter', $filter);
            TSession::setValue('test_item_barcode', $data->barcode);
            
            // put the data back to the form
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
            // start database transaction
            TTransaction::open('library');
            
            // create a repository for Item table
            $repository = new TRepository('Item');
            $limit = 10;
            // creates a criteria
            $criteria = new TCriteria;
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            if (TSession::getValue('test_item_filter'))
            {
                // filter by item barcode
                $criteria->add(TSession::getValue('test_item_filter'));
            }
            
            // load the objects according to the criteria
            $items = $repository->load($criteria);
            $this->datagrid->clear();
            if ($items)
            {
                foreach ($items as $item)
                {
                    // add the objects inside the datagrid
                    $this->datagrid->addItem($item);
                }
            }
            
            // clear the criteria
            $criteria->resetProperties();
            $count= $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
            // commit and closes the database transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // exceptions
        {
            // show the error message
            new TMessage('error', '<b>Erro</b> ' . $e->getMessage());
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
            TTransaction::open('library');
            
            // load the active record
            $rep = new TRepository('Item');
            $criteria = new TCriteria;
            $criteria->add(new TFilter('barcode', '=', $key));
            $objects = $rep->load($criteria);
            if ($objects)
            {
                $item = $objects[0];
                
                $object = new StdClass;
                $object->barcode_input      = $item->barcode;
                $object->book_title_input   = $item->title;
                
                TForm::sendData('form_Loan', $object);
            }
            else
            {
                $object = new StdClass;
                $object->barcode_input      = '';
                $object->book_title_input   = '';
                
                TForm::sendData('form_Loan', $object);
            }
            
            // closes the transaction
            TTransaction::close();
            parent::closeWindow(); // closes the window
        }
        catch (Exception $e) // em caso de exceção
        {
            // exibe a mensagem gerada pela exceção
            new TMessage('error', $e->getMessage());
            // desfaz todas alterações no banco de dados
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
