<?php
/**
 * AuthorList Listing
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AuthorList extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $loaded;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // defines the database
        parent::setDatabase('library');
        
        // defines the active record
        parent::setActiveRecord('Author');
        
        // add filter fields
        parent::addFilterField('name', 'like', 'name');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Author');
        $this->form->setFormTitle( _t('Authors') );        
        
        // create the form fields
        $filter = new TEntry('name');
        $filter->setValue(TSession::getValue('Author_name'));
        
        $this->form->addFields( [new TLabel(_t('Name'))], [$filter] );
        $filter->setSize('100%');
        
        $btn = $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'),  new TAction(array('AuthorForm', 'onEdit')), 'fa:plus-square green');
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);
        

        // creates the datagrid columns
        $id   = new TDataGridColumn('id', 'id', 'right', 100);
        $name   = new TDataGridColumn('name', 'name', 'left', NULL);


        // creates the datagrid actions
        $order1= new TAction(array($this, 'onReload'));
        $order2= new TAction(array($this, 'onReload'));


        // define the ordering parameters
        $order1->setParameter('order', 'id');
        $order2->setParameter('order', 'name');


        // assign the ordering actions
        $id->setAction($order1);
        $name->setAction($order2);


        // add the columns to the DataGrid
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($name);

        
        // creates two datagrid actions
        $action1 = new TDataGridAction(array('AuthorForm', 'onEdit'));
        $action1->setLabel(_t('Edit'));
        $action1->setImage('fa:pencil-square-o blue fa-lg');
        $action1->setField('id');
        
        $action2 = new TDataGridAction(array($this, 'onDelete'));
        $action2->setLabel(_t('Delete'));
        $action2->setImage('fa:trash-o red fa-lg');
        $action2->setField('id');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        // add the vbox inside the page
        parent::add($container);
    }
}
