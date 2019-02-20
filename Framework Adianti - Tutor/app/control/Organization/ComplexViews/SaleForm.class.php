<?php
/**
 * SaleForm Registration
 * @author  <your name here>
 */
class SaleForm extends TPage
{
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Sale');
        $this->form->setFormTitle('Sale');
        
        // master fields
        $id          = new TEntry('id');
        $date        = new TDate('date');
        $customer_id = new TDBUniqueSearch('customer_id', 'samples', 'Customer', 'id', 'name');
        $obs         = new TText('obs');
        
        // detail fields
        $product_id  = new TDBUniqueSearch('product_id', 'samples', 'Product', 'id', 'description');
        $sale_price  = new TEntry('product_price');
        $amount      = new TEntry('product_amount');
        $discount    = new TEntry('product_discount');
        $total       = new TEntry('product_total');
        
        // adjust field properties
        $id->setEditable(false);
        $customer_id->setSize('100%');
        $date->setSize('100%');
        $obs->setSize('100%', 80);
        $product_id->setSize('100%');
        $sale_price->setSize('100%');
        $amount->setSize('100%');
        $discount->setSize('100%');
        $customer_id->setMinLength(1);
        $product_id->setMinLength(1);
        
        // add validations
        $date->addValidation('Date', new TRequiredValidator);
        $customer_id->addValidation('Customer', new TRequiredValidator);
        $product_id->setChangeAction(new TAction([$this,'onProductChange']));
        
        // add master form fields
        $this->form->addFields( [new TLabel('ID')], [$id], 
                                [$label_date     = new TLabel('Date (*)')], [$date] );
        $this->form->addFields( [$label_customer = new TLabel('Customer (*)')], [$customer_id ] );
        $this->form->addFields( [new TLabel('Obs')], [$obs] );
        
        $label_date->setFontColor('#FF0000');
        $label_customer->setFontColor('#FF0000');
        
        $add_product = TButton::create('add_product', [$this, 'onProductAdd'], 'Register', 'fa:save');
        
        $label_product    = new TLabel('Product (*)');
        $label_sale_price = new TLabel('Price (*)');
        $label_amount     = new TLabel('Amount(*)');
        
        $label_product->setFontColor('#FF0000');
        $label_amount->setFontColor('#FF0000');
        $label_sale_price->setFontColor('#FF0000');
        
        $this->form->addContent( ['<h4>Details</h4><hr>'] );
        $this->form->addFields( [$label_product], [$product_id], [$label_amount], [$amount] );
        $this->form->addFields( [$label_sale_price], [$sale_price], [new TLabel('Discount')], [$discount] );
        $this->form->addFields( [], [$add_product] )->style = 'background: whitesmoke; padding: 5px; margin: 1px;';
        
        $this->product_list = new BootstrapDatagridWrapper(new TDataGrid);
        $this->product_list->setId('products_list');
        $this->product_list->style = "min-width: 700px; width:100%;margin-bottom: 10px";
        
        $col_id     = new TDataGridColumn( 'product_id', 'ID', 'center', '10%');
        $col_name   = new TDataGridColumn( 'product_name', 'Product', 'left', '30%');
        $col_amount = new TDataGridColumn( 'product_amount', 'Amount', 'left', '10%');
        $col_price  = new TDataGridColumn( 'product_price', 'Price', 'right', '15%');
        $col_disc   = new TDataGridColumn( 'product_discount', 'Discount', 'right', '15%');
        $col_subt   = new TDataGridColumn( '={product_amount} * ( {product_price} - {product_discount} )', 'Subtotal', 'right', '20%');
        
        $this->product_list->addColumn($col_id);
        $this->product_list->addColumn($col_name);
        $this->product_list->addColumn($col_amount);
        $this->product_list->addColumn($col_price);
        $this->product_list->addColumn($col_disc);
        $this->product_list->addColumn($col_subt);
        
        // creates two datagrid actions
        $action1 = new TDataGridAction([$this, 'onEditItemProduto']);
        $action1->setLabel('Edit');
        $action1->setImage('fa:edit blue');
        $action1->setField('product_id');
        
        $action2 = new TDataGridAction([$this, 'onDeleteItem']);
        $action2->setLabel('Delete');
        $action2->setImage('fa:trash red');
        $action2->setField('product_id');
        
        // add the actions to the datagrid
        $this->product_list->addAction($action1);
        $this->product_list->addAction($action2);
        
        $this->product_list->createModel();
        
        $panel = new TPanelGroup;
        $panel->add($this->product_list);
        $panel->getBody()->style = 'overflow-x:auto';
        $this->form->addContent( [$panel] );
        
        $format_value = function($value) {
            if (is_numeric($value)) {
                return 'R$ '.number_format($value, 2, ',', '.');
            }
            return $value;
        };
        
        $col_price->setTransformer( $format_value );
        $col_disc->setTransformer( $format_value );
        $col_subt->setTransformer( $format_value );
        
        $this->form->addAction( 'Save',  new TAction([$this, 'onSave']), 'fa:save green');
        $this->form->addAction( 'Clear', new TAction([$this, 'onClear']), 'fa:eraser red');
        
        // create the page container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        parent::add($container);
    }
    
    /**
     * Pre load some data
     */
    public function onLoad($param)
    {
        $data = new stdClass;
        $data->customer_id   = $param['customer_id'];
        $this->form->setData($data);
    }
    
    
    /**
     * On product change
     */
    static function onProductChange( $params )
    {
        if( !empty($params['product_id']) )
        {
            try
            {
                TTransaction::open('samples');
                
                $product   = new Product($params['product_id']);
                $fill_data = new StdClass;
                $fill_data->product_price = $product->sale_price;
                
                TForm::sendData('form_Sale', $fill_data);
                TTransaction::close();
            }
            catch (Exception $e) // in case of exception
            {
                new TMessage('error', $e->getMessage());
                TTransaction::rollback();
            }
        }
    }
    
    
    /**
     * Clear form
     * @param $param URL parameters
     */
    function onClear($param)
    {
        $this->form->clear();
        TSession::setValue('sale_items', array());
        $this->onReload( $param );
    }
    
    /**
     * Add a product into item list
     * @param $param URL parameters
     */
    public function onProductAdd( $param )
    {
        try
        {
            TTransaction::open('samples');
            $data = $this->form->getData();
            
            if( (! $data->product_id) || (! $data->product_amount) || (! $data->product_price) )
                throw new Exception('The fields Product, Amount and Price are required');
            
            $product = new Product($data->product_id);
            
            $sale_items = TSession::getValue('sale_items');
            $key = (int) $data->product_id;
            $sale_items[ $key ] = ['product_id'       => $data->product_id,
                                   'product_name'     => $product->description,
                                   'product_amount'   => $data->product_amount,
                                   'product_price'    => $data->product_price,
                                   'product_discount' => $data->product_discount];
            
            TSession::setValue('sale_items', $sale_items);
            
            // clear product form fields after add
            $data->product_id = '';
            $data->product_name = '';
            $data->product_amount = '';
            $data->product_price = '';
            $data->product_discount = '';
            TTransaction::close();
            $this->form->setData($data);
            
            $this->onReload( $param ); // reload the sale items
        }
        catch (Exception $e)
        {
            $this->form->setData( $this->form->getData());
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Edit a product from item list
     * @param $param URL parameters
     */
    public static function onEditItemProduto( $param )
    {
        // read session items
        $sale_items = TSession::getValue('sale_items');
        
        // get the session item
        $sale_item = $sale_items[ (int) $param['product_id'] ];
        
        $data = new stdClass;
        $data->product_id       = $param['product_id'];
        $data->product_name     = $sale_item['product_name'];
        $data->product_amount   = $sale_item['product_amount'];
        $data->product_price    = $sale_item['product_price'];
        $data->product_discount = $sale_item['product_discount'];
        
        // fill product fields
        TForm::sendData( 'form_Sale', $data );
    }
    
    /**
     * Delete a product from item list
     * @param $param URL parameters
     */
    public static function onDeleteItem( $param )
    {
        $data = new stdClass;
        $data->product_id = '';
        $data->product_name = '';
        $data->product_amount = '';
        $data->product_price = '';
        $data->product_discount = '';
        
        // clear form data
        TForm::sendData('form_Sale', $data );
        
        // read session items
        $sale_items = TSession::getValue('sale_items');
        
        $product_id = (int) $param['product_id'];
        
        // delete the item from session
        unset($sale_items[ $product_id ] );
        
        // store the product list back to the session
        TSession::setValue('sale_items', $sale_items);
        
        // delete item from screen
        TScript::create("ttable_remove_row_by_id('products_list', '{$product_id}')");
    }
    
    /**
     * Reload the item list
     * @param $param URL parameters
     */
    public function onReload($param)
    {
        // read session items
        $sale_items = TSession::getValue('sale_items');
        
        $this->product_list->clear(); // clear product list
        
        if ($sale_items)
        {
            // iterate session items
            foreach ($sale_items as $list_product_id => $list_product)
            {
                // add into the details list
                $row = $this->product_list->addItem( (object) $list_product );
                
                // define an id for the table row
                $row->id = $list_product['product_id'];
            }
        }
        
        $this->loaded = TRUE;
    }
    
    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onEdit($param)
    {
        try
        {
            TTransaction::open('samples');
            
            if (isset($param['key']))
            {
                $key = $param['key'];
                
                $object = new Sale($key);
                $sale_items = $object->getSaleItems();
                
                $items = array();
                foreach( $sale_items as $item )
                {
                    $items[$item->product_id] = $item->toArray();
                    $items[$item->product_id]['product_id'] = $item->product_id;
                    $items[$item->product_id]['product_name'] = $item->product->description;
                    $items[$item->product_id]['product_amount'] = $item->amount;
                    $items[$item->product_id]['product_price'] = $item->sale_price;
                    $items[$item->product_id]['product_discount'] = $item->discount;
                }
                TSession::setValue('sale_items', $items);
                
                $this->form->setData($object); // fill the form with the active record data
                $this->onReload( $param ); // reload sale items list
                TTransaction::close(); // close transaction
            }
            else
            {
                $this->form->clear();
                TSession::setValue('sale_items', null);
                $this->onReload( $param );
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
    
    /**
     * Save the sale and the sale items
     */
    function onSave()
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            $sale = $this->form->getData('Sale');
            $this->form->validate(); // form validation
            
            // get session items
            $sale_items = TSession::getValue('sale_items');
            
            if( $sale_items )
            {
                $total = 0;
                foreach( $sale_items as $sale_item )
                {
                    $item = new SaleItem;
                    $item->product_id  = $sale_item['product_id'];
                    $item->sale_price  = (float) $sale_item['product_price'];
                    $item->amount      = (float) $sale_item['product_amount'];
                    $item->discount    = (float) $sale_item['product_discount'];
                    $item->total       = ( $item->sale_price * $item->amount ) - $item->discount;
                    
                    $sale->addSaleItem($item);
                    $total += $item->total;
                }
            }
            $sale->total = $total;
            $sale->store(); // stores the object
            $this->form->setData($sale); // keep form data
            TTransaction::close(); // close the transaction
            
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback();
        }
    }
    
    /**
     * Show the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded AND (!isset($_GET['method']) OR $_GET['method'] !== 'onReload' OR $_GET['method'] !== 'onEdit') )
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
