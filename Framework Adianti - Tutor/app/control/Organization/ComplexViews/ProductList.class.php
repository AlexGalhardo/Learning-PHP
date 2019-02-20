<?php
/**
 * Product List
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ProductList extends TPage
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    
    // trait with onReload, onSearch, onDelete...
    use Adianti\Base\AdiantiStandardListTrait;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('samples');                // defines the database
        $this->setActiveRecord('Product');            // defines the active record
        $this->setDefaultOrder('id', 'asc');          // defines the default order
        $this->addFilterField('description', 'like'); // add a filter field
        $this->addFilterField('unity', '=');          // add a filter field
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Product');
        $this->form->setFormTitle(_t('Product list'));
        
        // create the form fields
        $description = new TEntry('description');
        $unit        = new TCombo('unity');
        $unit->addItems( ['PC' => 'Pieces', 'GR' => 'Grain'] );
        
        // add a row for the filter field
        $this->form->addFields( [new TLabel('Description')], [$description] );
        $this->form->addFields( [new TLabel('Unit')], [$unit] );
        
        $this->form->setData( TSession::getValue('ProductList_filter_data') );
        
        $this->form->addAction( 'Find', new TAction([$this, 'onSearch']), 'fa:search blue');
        $this->form->addActionLink( 'New',  new TAction(['ProductForm', 'onEdit']), 'fa:plus green');
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->enablePopover('Image', "<img style='max-height: 300px' src='{photo_path}'>");

        // creates the datagrid columns
        $col_id          = new TDataGridColumn('id', 'ID', 'center', '10%');
        $col_description = new TDataGridColumn('description', 'Description', 'left', '45%');
        $col_stock       = new TDataGridColumn('stock', 'Stock', 'right', '15%');
        $col_sale_price  = new TDataGridColumn('sale_price', 'Sale Price', 'right', '15%');
        $col_unity       = new TDataGridColumn('unity', 'Unit', 'right', '15%');
        
        $this->datagrid->addColumn($col_id);
        $this->datagrid->addColumn($col_description);
        $this->datagrid->addColumn($col_stock);
        $this->datagrid->addColumn($col_sale_price);
        $this->datagrid->addColumn($col_unity);
        
        $action1 = new TDataGridAction(['ProductForm', 'onEdit']);
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
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->enableCounters();
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'ProductList'));
        $container->add($this->form);
        $container->add($panel = TPanelGroup::pack('', $this->datagrid, $this->pageNavigation));
        $panel->getBody()->style = 'overflow-x:auto';
        parent::add($container);
    }
}
