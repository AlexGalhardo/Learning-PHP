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
class ProductUpdateList extends TPage
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $saveButton;
    
    // trait with onReload, onSearch, onDelete...
    use Adianti\Base\AdiantiStandardListTrait;
    
    /**
     * Page constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('samples');
        $this->setActiveRecord('Product');
        $this->setDefaultOrder('id', 'asc');
        $this->addFilterField('description', 'like', 'description');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Product');
        $this->form->setFormTitle(_t('Batch update list'));
        
        // create the form fields
        $description = new TEntry('description');
        $this->form->addFields( [new TLabel('Description')], [$description] );
        
        $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        
        // keep the form filled with session data
        $this->form->setData( TSession::getValue('ProductUpdateList_filter_data') );
        
        // creates the datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->disableDefaultClick();
        $this->datagrid->style = 'width: 100%';
        
        // create the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'left');
        $column_description = new TDataGridColumn('description', 'Description', 'left');
        $column_unity = new TDataGridColumn('unity', 'Unity', 'center');
        $column_stock = new TDataGridColumn('stock', 'Stock', 'right');
        $column_sale_price = new TDataGridColumn('sale_price_widget', 'Sale Price', 'right');

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
        
        // put datagrid inside a form
        $this->formgrid = new TForm;
        $this->formgrid->add($this->datagrid);
        
        // creates the update collection button
        $this->saveButton = new TButton('update_collection');
        $this->saveButton->setAction(new TAction(array($this, 'onSaveCollection')), 'Save');
        $this->saveButton->setImage('fa:save green');
        $this->formgrid->addField($this->saveButton);
        
        $gridpack = new TVBox;
        $gridpack->style = 'width: 100%';
        $gridpack->add($this->formgrid);
        $gridpack->add($this->saveButton)->style = 'background:whiteSmoke;border:1px solid #cccccc; padding: 3px;padding: 5px;';
        
        // define the datagrid transformer method
        $this->setTransformer(array($this, 'onBeforeLoad'));
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel = TPanelGroup::pack('', $gridpack, $this->pageNavigation));
        $panel->getBody()->style = 'overflow-x: auto';
        parent::add($container);
    }
    
    /**
     * Run before the datagrid is loaded
     */
    public function onBeforeLoad($objects, $param)
    {
        // update the action parameters to pass the current page to action
        // without this, the action will only work for the first page
        $saveAction = $this->saveButton->getAction();
        $saveAction->setParameters($param); // important!
        
        $gridfields = array( $this->saveButton );
        
        foreach ($objects as $object)
        {
            $object->sale_price_widget = new TEntry('sale_price' . '_' . $object->id);
            $object->sale_price_widget->setValue( $object->sale_price );
            $object->sale_price_widget->setNumericMask(1,'.',',');
            $object->sale_price_widget->setSize(120);
            $gridfields[] = $object->sale_price_widget; // important
        }
        
        $this->formgrid->setFields($gridfields);
    }
    
    /**
     * Save the datagrid objects
     */
    public function onSaveCollection()
    {
        $data = $this->formgrid->getData(); // get datagrid form data
        $this->formgrid->setData($data); // keep the form filled
        
        try
        {
            // open transaction
            TTransaction::open('samples');
            
            // iterate datagrid form objects
            foreach ($this->formgrid->getFields() as $name => $field)
            {
                if ($field instanceof TEntry)
                {
                    $parts = explode('_', $name);
                    $id = end($parts);
                    $object = Product::find($id);
                    if ($object)
                    {
                        $object->sale_price = str_replace(',', '', $field->getValue());
                        $object->store();
                    }
                }
            }
            new TMessage('info', AdiantiCoreTranslator::translate('Records updated'));
            
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
