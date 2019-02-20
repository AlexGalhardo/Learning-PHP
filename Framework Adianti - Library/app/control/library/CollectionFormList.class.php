<?php
/**
 * CollectionFormList Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CollectionFormList extends TStandardFormList
{
    protected $form; // form
    protected $datagrid; // datagrid
    protected $pageNavigation;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // defines the database
        parent::setDatabase('library');
        
        // defines the active record
        parent::setActiveRecord('Collection');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Collection');
        $this->form->setFormTitle(_t('Collections', ''));
        
        // create the form fields
        $id            = new TEntry('id');
        $description   = new TEntry('description');

        $id->setEditable(FALSE);
        
        // define the sizes
        $this->form->addFields( [new TLabel(_t('Code'))], [$id] );
        $this->form->addFields( [new TLabel(_t('Description'))], [$description] );
        $id->setSize('50%');
        $description->setSize('100%');
        
        // define the form action
        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('Clear form'),  new TAction(array($this, 'onClear')), 'fa:eraser red');

        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);
        
        // creates the datagrid columns
        $this->datagrid->addQuickColumn(_t('Code'), 'id', 'left', 100, new TAction(array($this, 'onReload')), array('order', 'id'));
        $this->datagrid->addQuickColumn(_t('Description'), 'description', 'left', NULL, new TAction(array($this, 'onReload')), array('order', 'description'));

        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), new TDataGridAction(array($this, 'onEdit')), 'id', 'fa:pencil-square-o blue fa-lg');
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
