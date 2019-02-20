<?php
/**
 * BookList Listing
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class BookList extends TStandardList
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
        parent::setActiveRecord('Book');
        
        // defines the filter field
        parent::addFilterField('title', 'like', 'title');
        parent::addFilterField('author_id', '=', 'author_id');
        parent::addFilterField('collection_id', '=', 'collection_id');
        parent::addFilterField('classification_id', '=', 'classification_id');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Book');
        $this->form->setFormTitle( _t('Books') );
        
        // create the form fields
        $title             = new TEntry('title');
        $author_id         = new TDBSeekButton('author_id', 'library', $this->form->getName(), 'Author', 'name', 'author_id', 'author_name');
        $author_name       = new TEntry('author_name');
        $collection_id     = new TDBCombo('collection_id', 'library', 'Collection', 'id', 'description');
        $classification_id = new TDBCombo('classification_id', 'library', 'Classification', 'id', 'description');
        
        $title->setSize('100%');
        $author_id->setSize('calc(20% - 22px)');
        $author_id->setAuxiliar($author_name);
        $author_name->setSize('80%');
        $author_name->setEditable(FALSE);
        
        $this->form->addFields( [ new TLabel(_t('Title')) ], [ $title ] );
        $this->form->addFields( [ new TLabel(_t('Author')) ], [ $author_id ] );
        $this->form->addFields( [ new TLabel(_t('Collection')) ], [ $collection_id ] );
        $this->form->addFields( [ new TLabel(_t('Classification')) ], [ $classification_id ] );
        
        $btn=$this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'),  new TAction(array('BookForm', 'onClear')), 'fa:plus-square green');
        $this->form->setData(TSession::getValue('Book_filter_data'));
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        
        // creates the datagrid columns
        $id           = new TDataGridColumn('id', _t('Code'), 'right', 100);
        $title        = new TDataGridColumn('title', _t('Title'), 'left' );
        $main_author  = new TDataGridColumn('author_name', _t('Author'), 'left' );
        $edition      = new TDataGridColumn('edition', _t('Edition'), 'center' );
        $call         = new TDataGridColumn('call_number', _t('Call'), 'left' );

        // creates the datagrid actions
        $order1 = new TAction(array($this, 'onReload'));
        $order2 = new TAction(array($this, 'onReload'));

        // define the ordering parameters
        $order1->setParameter('order', 'id');
        $order2->setParameter('order', 'title');

        // assign the ordering actions
        $id->setAction($order1);
        $title->setAction($order2);
        
        // add the columns to the DataGrid
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($title);
        $this->datagrid->addColumn($main_author);
        $this->datagrid->addColumn($edition);
        $this->datagrid->addColumn($call);
        
        // creates two datagrid actions
        $action1 = new TDataGridAction(array('BookForm', 'onEdit'));
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
        $this->pageNavigation->enableCounters();
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        
        // creates the page structure using a vbox
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add( $panel );
        
        // add the vbox inside the page
        parent::add($container);
    }
}
