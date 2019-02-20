<?php
/**
 * SubjectList Listing
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SubjectList extends TStandardList
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
        parent::setDatabase('library');
        
        // defines the active record
        parent::setActiveRecord('Subject');
        
        // defines the filter field
        parent::setFilterField('name');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Subject');
        $this->form->setFormTitle( _t('Subjects') );
        
        // create the form fields
        $name = new TEntry('name');
        $name->setValue(TSession::getValue('Subject_name'));
        
        $this->form->addFields( [new TLabel(_t('Name'))], [$name] );
        $name->setSize('100%');
        
        $btn = $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'),  new TAction(array('SubjectForm', 'onEdit')), 'fa:plus-square green');
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);
        

        // creates the datagrid columns
        $this->datagrid->addQuickColumn(_t('Code'), 'id', 'right', 100, new TAction(array($this, 'onReload')), array('order', 'id'));
        $this->datagrid->addQuickColumn(_t('Name'), 'name', 'left', NULL, new TAction(array($this, 'onReload')), array('order', 'name'));

        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), new TDataGridAction(array('SubjectForm', 'onEdit')), 'id', 'fa:pencil-square-o blue fa-lg');
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
        
        // creates the page structure using a table
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        // add the vbox inside the page
        parent::add($container);
    }
}
