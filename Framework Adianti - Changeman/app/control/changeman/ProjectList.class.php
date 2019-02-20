<?php
/**
 * ProjectList Listing
 * @author  <your name here>
 */
class ProjectList extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // defines the database
        parent::setDatabase('changeman');
        
        // defines the active record
        parent::setActiveRecord('Project');
        
        // defines the filter field
        parent::setFilterField('description');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Project');
        $this->form->setFormTitle( _t('Project') );
        
        // create the form fields
        $description = new TEntry('description');
        $description->setValue(TSession::getValue('Project_description'));
        
        $this->form->addFields( [new TLabel(_t('Description'))], [$description] );
        
        $btn = $this->form->addAction( _t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction( _t('New'), new TAction(array('ProjectForm', 'onEdit')), 'fa:plus-square green');
        
        $description->setSize('80%');
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->width = '100%';
        $this->datagrid->setHeight(320);
        
        // creates the datagrid columns
        $this->datagrid->addQuickColumn('ID', 'id', 'right', 50, new TAction(array($this, 'onReload')), array('order', 'id'));
        $this->datagrid->addQuickColumn(_t('Description'), 'description', 'left', NULL, new TAction(array($this, 'onReload')), array('order', 'description'));
        
        // add the actions to the datagrid
        $class = 'ProjectForm';
        $this->datagrid->addQuickAction(_t('Edit'), new TDataGridAction(array($class, 'onEdit')), 'id', 'fa:pencil-square-o blue fa-lg');
        $this->datagrid->addQuickAction(_t('Delete'), new TDataGridAction(array($this, 'onDelete')), 'id', 'fa:trash-o red fa-lg');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
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
        $container->add($panel);
        
        // add the vbox inside the page
        parent::add($container);
    }
}
