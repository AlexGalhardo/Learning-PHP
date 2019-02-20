<?php
/**
 * ProductUpdateList
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ProductInstantUpdateList extends TStandardList
{
    protected $datagrid; // listing
    protected $pageNavigation;
    
    /**
     * Page constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        parent::setDatabase('samples');
        parent::setActiveRecord('Product');
        parent::setDefaultOrder('id', 'asc');
        // add the filter (filter field, operator, form field)
        parent::addFilterField('description', 'like', 'description');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Product');
        $this->form->setFormTitle(_t('Batch instant update list'));
        
        // create the form fields
        $description = new TEntry('description');
        $this->form->addFields( [new TLabel('Description')], [$description] );
        
        $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        
        // keep the form filled with session data
        $this->form->setData( TSession::getValue('Product_filter_data') );
        
        // creates the datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        
        // create the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'left');
        $column_description = new TDataGridColumn('description', 'Description', 'left');
        $column_unity = new TDataGridColumn('unity', 'Unity', 'center');
        $column_stock = new TDataGridColumn('stock', 'Stock', 'right');
        $column_sale_price = new TDataGridColumn('sale_price_widget', 'Sale Price', 'right');

        $column_sale_price->setTransformer( function($value, $object, $row) {
            $widget = new TEntry('sale_price' . '_' . $object->id);
            $widget->setValue( $object->sale_price );
            $widget->setNumericMask(1,'.',',');
            $widget->setSize(120);
            $widget->setFormName('form_search_Product');
            
            $action = new TAction( [$this, 'onSaveInline'] );
            $action->setParameter('column', 'sale_price');
            $widget->setExitAction( $action );
            return $widget;
        });
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_description);
        $this->datagrid->addColumn($column_unity);
        $this->datagrid->addColumn($column_stock);
        $this->datagrid->addColumn($column_sale_price);

        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the pagination
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $this->datagrid->disableDefaultClick();
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add(TPanelGroup::pack('', $this->datagrid, $this->pageNavigation));
        
        parent::add($container);
    }
    
    /**
     * Save the datagrid objects
     */
    public static function onSaveInline($param)
    {
        $name   = $param['_field_name'];
        $value  = $param['_field_value'];
        $column = $param['column'];
        $parts  = explode('_', $name);
        $id     = end($parts);
        
        try
        {
            // open transaction
            TTransaction::open('samples');
            
            $object = Product::find($id);
            if ($object)
            {
                $object->$column = $value;
                $object->store();
            }
            
            // close transaction
            TTransaction::close();
        }
        catch (Exception $e)
        {
            // show the exception message
            new TMessage('error', $e->getMessage());
        }
    }
}
