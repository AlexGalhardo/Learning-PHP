<?php
/**
 * POSFormView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class POSFormView extends TPage
{
    private $form;
    private $datagrid;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page
     */
    public function __construct()
    {
        parent::__construct();
        
        // creates the items form and add a table inside
        $this->form = new BootstrapFormBuilder('form_pos');
        $this->form->setFormTitle(_t('POS form (Master/detail)'));
        
        // create the form fields
        $product_id           = new TDBSeekButton('product_id', 'samples', 'form_pos', 'Product', 'description');
        $product_description  = new TEntry('product_description');
        $sale_price           = new TEntry('sale_price');
        $amount               = new TEntry('amount');
        $total                = new TEntry('total');
        
        // add validators
        $product_id->addValidation('Product', new TRequiredValidator);
        $amount->addValidation('Amount', new TRequiredValidator);
        
        // define the exit actions
        $product_id->setExitAction(new TAction(array($this, 'onExitProduct')));
        $amount->setExitAction(new TAction(array($this, 'onUpdateTotal')));
        
        // define some attributes
        $product_id->style = 'font-size: 17pt';
        $product_description->style = 'font-size: 17pt';
        $sale_price->style = 'font-size: 17pt';
        $amount->style = 'font-size: 17pt';
        $total->style = 'font-size: 17pt';
        $product_id->button->style = 'margin-top:0px; vertical-align:top';
        
        // define some properties
        $product_id->setSize(50);
        $product_id->setAuxiliar($product_description);
        $product_description->setEditable(FALSE);
        $product_description->setSize(150);
        $sale_price->setEditable(FALSE);
        $total->setEditable(FALSE);
        $sale_price->setNumericMask(2, '.', ',');
        $total->setNumericMask(2, '.', ',');
        $sale_price->setSize(150);
        $amount->setSize(150);
        $total->setSize(150);
        
        // create the field labels
        $lab_pro = new TLabel('Product');
        $lab_pri = new TLabel('Price');
        $lab_amo = new TLabel('Amount');
        $lab_tot = new TLabel('Total');
        $lab_pro->setFontSize(17);
        $lab_pri->setFontSize(17);
        $lab_amo->setFontSize(17);
        $lab_tot->setFontSize(17);
        $lab_pro->setFontColor('red');
        $lab_amo->setFontColor('red');
        $this->form->addField($product_description);
        
        // add the form fields
        $this->form->addFields([$lab_pro], [$product_id], [$lab_pri], [$sale_price]);
        $this->form->addFields([$lab_amo], [$amount], [$lab_tot], [$total]);
        $this->form->addAction('Add Item', $a1=new TAction(array($this, 'onAddItem')), 'fa:plus green');
        $this->form->addAction('Clear',    $a2=new TAction(array($this, 'onClear')),   'fa:trash red');
        $this->form->addAction('Save',     $a3=new TAction(array($this, 'onCustomer')),'fa:save blue');
        
        $a1->setParameter('register_state', 'false');
        $a2->setParameter('register_state', 'false');
        $a3->setParameter('register_state', 'false');
        
        // creates the grid for items
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->makeScrollable();
        $this->datagrid->setHeight( 150 );
        
        $this->datagrid->addQuickColumn('ID', 'product_id', 'right', 50);
        $this->datagrid->addQuickColumn('Description', 'product_description', 'left');
        $this->datagrid->addQuickColumn('Price', 'sale_price', 'right');
        $this->datagrid->addQuickColumn('Amount', 'amount', 'right');
        $total = $this->datagrid->addQuickColumn('Total', 'total', 'right');
        
        $total->setTotalFunction( function($values) {
            return array_sum((array) $values);
        });
        
        $format_value = function($value) {
            if (is_numeric($value)) {
                return 'R$ '.number_format($value, 2, ',', '.');
            }
            return $value;
        };
        $total->setTransformer($format_value);
        
        $this->datagrid->addQuickAction('Delete', $a3=new TDataGridAction(array($this, 'onDelete')), 'product_id', 'fa:trash red');
        $this->datagrid->createModel();
        $a3->setParameter('register_state', 'false');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        $vbox->add($panel = TPanelGroup::pack('Itens', $this->datagrid));
        $panel->getBody()->style = 'overflow-x: auto';
        parent::add($vbox);
    }
    
    /**
     * Add a product into the cart
     */
    public function onAddItem()
    {
        try
        {
            $this->form->validate(); // validate form data
            
            $items = TSession::getValue('items'); // get items from session
            $item = $this->form->getData('SaleItem');
            
            $item->sale_price = str_replace(['.', ','], ['', '.'], $item->sale_price);
            $item->total      = str_replace(['.', ','], ['', '.'], $item->total);
            
            $items[ $item->product_id ] = $item; // add the item
            
            TSession::setValue('items', $items); // store back tthe session
            $this->form->clear(); // clear form
            $this->onReload(); // reload data
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Clear items
     */
    public function onClear($param)
    {
        TSession::setValue('items', []);
        $this->form->clear(); // clear form
        $this->onReload(); // reload data
    }
    
    /**
     * Select customer
     */
    public function onCustomer($param)
    {
        $form = new TQuickForm('form_customer');
        $form->style = 'padding:20px';
        
        $customer_id   = new TDBSeekButton('customer_id', 'samples', 'form_customer', 'Customer', 'name', 'customer_id', 'customer_name');
        $customer_name = new TEntry('customer_name');
        $customer_id->setAuxiliar($customer_name);
        $customer_name->setEditable(FALSE);
        
        $form->addQuickField('Customer', $customer_id);
        
        $customer_id->setSize(50);
        $customer_name->setSize(200);
        
        $form->addQuickAction('Save', new TAction(array($this, 'onSave')), 'fa:save green');
        
        // show the input dialog
        new TInputDialog('Customer', $form);
    }
    
    /**
     * Saves the cart
     */
    public function onSave( $param )
    {
        try
        {
            if (empty($param['customer_id']))
            {
                throw new Exception('Customer is required');
            }
            
            $data = (object) $param;
            
            TTransaction::open('samples');
            $items = TSession::getValue('items'); // get items
            if ($items)
            {
                $sale = new Sale; // create a new Sale
                $sale->customer_id = $data->customer_id;
                $sale->date = date('Y-m-d');
                $total = 0;
                foreach ($items as $item)
                {
                    $item->sale_price = $item->sale_price;
                    $item->total      = $item->total;
                    $total += $item->total;
                    
                    $sale->addSaleItem($item); // add the item to the Sale
                }
                $sale->total = $total;
                $sale->store(); // store the Sale
                
                // clear items
                TSession::setValue('items', NULL);
                new TMessage('info', 'Record saved successfully');
            }
            TTransaction::close();
            $this->onReload();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Exit action for the field product
     * Fill some form fields (sale_price, amount, total)
     */
    public static function onExitProduct($param)
    {
        $product_id = $param['product_id']; // get the product code
        try
        {
            TTransaction::open('samples');
            $product = new Product($product_id); // reads the product
            
            $obj = new StdClass;
            $obj->sale_price  = number_format($product->sale_price, 2, ',', '.');
            $obj->amount = 1;
            $obj->total       = number_format($product->sale_price, 2, ',', '.');
            TTransaction::close();
            TForm::sendData('form_pos', $obj);
        }
        catch (Exception $e)
        {
            // does nothing
        }
    }
    
    /**
     * Update the total based on the sale price, amount
     */
    public static function onUpdateTotal($param)
    {
        $sale_price = (double) str_replace(['.', ','], ['', '.'], $param['sale_price']);
        $amount     = (double) str_replace(['.', ','], ['', '.'], $param['amount']);
        
        $obj = new StdClass;
        $obj->total = number_format( ($sale_price * $amount), 2, ',', '.');
        TForm::sendData('form_pos', $obj);
    }
    
    /**
     * Remove a product from the cart
     */
    public function onDelete($param)
    {
        // get the cart objects from session
        $items = TSession::getValue('items');
        unset($items[ $param['key'] ]); // remove the product from the array
        TSession::setValue('items', $items); // put the array back to the session
        
        // reload datagrid
        $this->onReload( func_get_arg(0) );
    }
    
    /**
     * Reload the datagrid with the objects from the session
     */
    function onReload($param = NULL)
    {
        try
        {
            $this->datagrid->clear(); // clear datagrid
            $items = TSession::getValue('items');
            if ($items)
            {
                foreach ($items as $object)
                {
                    // add the item inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Show the page
     */
    public function show()
    {
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
