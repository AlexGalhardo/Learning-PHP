<?php
/**
 * SaleDetailForm
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SaleDetailForm extends TPage
{
    protected $form;
    protected $product_list;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    public function __construct()
    {
        parent::__construct();
        $this->adianti_target_container = 'details_area';
        
        $this->form = new BootstrapFormBuilder('form_Details');
        
        // detail fields
        $product_id     = new TDBSeekButton('product_id', 'samples', $this->form->getName(), 'Product', 'description', 'product_id', 'product_name');
        $product_name   = new TEntry('product_name');
        $sale_price     = new TEntry('product_price');
        $amount         = new TEntry('product_amount');
        $discount       = new TEntry('product_discount');
        
        $product_id->addValidation( 'Product', new TRequiredValidator );
        $sale_price->addValidation( 'Price', new TRequiredValidator );
        $amount->addValidation( 'Amount', new TRequiredValidator );
        
        $product_id->setSize('80');
        $product_id->setAuxiliar($product_name);
        $product_name->setSize('calc(100% - 100px)');
        $sale_price->setSize('100%');
        $amount->setSize('100%');
        $discount->setSize('100%');
        $product_name->setEditable(false);
        $product_id->setExitAction(new TAction(array($this,'onProductChange')));
        
        $this->form->addFields( [$label_product    = new TLabel('Product')], [$product_id] );
        $this->form->addFields( [$label_amount     = new TLabel('Amount')], [$amount],
                                [$label_sale_price = new TLabel('Price')], [$sale_price], 
                                [new TLabel('Discount')], [$discount] );
        
        $label_product->setFontColor('#FF0000');
        $label_amount->setFontColor('#FF0000');
        $label_sale_price->setFontColor('#FF0000');
        
        $add_action = new TAction(array($this, 'onProductAdd'));
        $add_action->setParameter('register_state', 'false');
        $this->form->addAction( 'Register', $add_action, 'fa:hand-o-down');
        
        $this->product_list = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->product_list->style = 'margin-bottom:0px';
        $this->product_list->addQuickColumn('ID', 'product_id', 'center', '10%');
        $this->product_list->addQuickColumn('Product', 'product_name', 'left', '30%');
        $this->product_list->addQuickColumn('Amount', 'product_amount', 'left', '15%');
        $pr = $this->product_list->addQuickColumn('Price','product_price', 'right', '15%');
        $ds = $this->product_list->addQuickColumn('Discount','product_discount', 'right', '15%');
        $st = $this->product_list->addQuickColumn('Subtotal','={product_amount} * ( {product_price} - {product_discount} )', 'right', '15%');
        
        $edit_action = new TDataGridAction([$this, 'onEdit']);
        $delete_action = new TDataGridAction([$this, 'onDelete']);
        $edit_action->setParameter('register_state', 'false');
        $delete_action->setParameter('register_state', 'false');
        $this->product_list->addQuickAction('Edit', $edit_action, 'product_id', 'fa:edit blue');
        $this->product_list->addQuickAction('Delete', $delete_action, 'product_id', 'fa:trash red');
        
        $this->product_list->createModel();
        
        $format_value = function($value) {
            if (is_numeric($value)) {
                return 'R$ '.number_format($value, 2, ',', '.');
            }
            return $value;
        };
        
        $pr->setTransformer( $format_value );
        $ds->setTransformer( $format_value );
        $st->setTransformer( $format_value );
        
        $st->setTotalFunction( function($values) {
            return array_sum((array) $values);
        });
        
        $panel = TPanelGroup::pack('', $this->product_list);
        $panel->style = 'margin-bottom:0';
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add( $this->form );
        $vbox->add( $panel );
        
        parent::add($vbox);
    }

    /**
     * On product change
     */
    static function onProductChange( $params )
    {
        if( isset($params['product_id']) && $params['product_id'] )
        {
            try
            {
                TTransaction::open('samples');
                
                $product = new Product($params['product_id']);
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
     * Add a product into item list
     * @param $param URL parameters
     */
    public function onProductAdd( $param )
    {
        try
        {
            TTransaction::open('samples');
            $data = $this->form->getData();
            
            $this->form->validate();
            $product = new Product($data->product_id);
            
            $sale_items = TSession::getValue('sale_items');
            $key = (int) $data->product_id;
            $sale_items[ $key ] = array('product_id'       => $data->product_id,
                                        'product_name'     => $product->description,
                                        'product_amount'   => $data->product_amount,
                                        'product_price'    => $data->product_price,
                                        'product_discount' => $data->product_discount);
            
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
    public function onEdit( $param )
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
        $this->form->setData( $data );
    
        $this->onReload( $param );
    }
    
    /**
     * Delete a product from item list
     * @param $param URL parameters
     */
    public function onDelete( $param )
    {
        // read session items
        $sale_items = TSession::getValue('sale_items');
        
        // delete the item from session
        unset($sale_items[ (int) $param['product_id'] ] );
        TSession::setValue('sale_items', $sale_items);
        
        // reload sale items
        $this->onReload( $param );
    }
    
    /**
     * Reload the products list
     * @param $param URL parameters
     */
    public function onReload()
    {
        // read session items
        $sale_items = TSession::getValue('sale_items');
        
        $this->product_list->clear(); // clear product list
        $data = $this->form->getData();
        
        if ($sale_items)
        {
            foreach ($sale_items as $list_product_id => $list_product)
            {
                $item = (object) $list_product;
                $this->product_list->addItem( $item );
            }
        }
        
        $this->loaded = TRUE;
    }
    
    /**
     * method show()
     * Shows the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded )
        {
            $this->onReload();
        }
        parent::show();
    }
}
