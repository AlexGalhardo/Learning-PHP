<?php
/**
 * SaleMasterForm
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SaleMasterForm extends TPage
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
        $this->form   = new BootstrapFormBuilder('form_Sale');
        $this->form->setFormTitle( 'Sale' );
        
        // master fields
        $id             = new TEntry('id');
        $date           = new TDate('date');
        $customer_id    = new TDBSeekButton('customer_id', 'samples', $this->form->getName(), 'Customer', 'name', 'customer_id', 'customer_name');
        $customer_name  = new TEntry('customer_name');
        $obs            = new TText('obs');
        
        $id->setSize(40);
        $date->setSize(120);
        $obs->setSize('100%', 50);
        $customer_id->setSize(80);
        $customer_name->setSize('calc(100% - 100px)');
        $customer_id->setAuxiliar($customer_name);
        
        $id->setEditable(false);
        $customer_name->setEditable(false);
        $date->addValidation('Date', new TRequiredValidator);
        $customer_id->addValidation('Customer', new TRequiredValidator);
        
        $this->form->addFields( [new TLabel('ID')], [$id] );
        $this->form->addFields( [$label_date = new TLabel('Date')], [$date] );
        $this->form->addFields( [$label_customer = new TLabel('Customer')], [ $customer_id ] );
        $this->form->addFields( [new TLabel('Obs')], [$obs] );
        $label_date->setFontColor('#FF0000');
        $label_customer->setFontColor('#FF0000');
        
        $this->form->addAction( _t('Save'),  new TAction(array($this, 'onSave')),  'fa:save green');
        $this->form->addAction( _t('Clear'), new TAction(array($this, 'onClear')), 'fa:eraser red');
        
        // place where the products page will be inserted
        $details_area = new TElement('div');
        $details_area->id = 'details_area';
        
        $this->form->addContent( [TElement::tag('h4', 'Products')] );
        $this->form->addContent( [$details_area] );

        // Load SaleDetailForm into details_area
        AdiantiCoreApplication::loadPage('SaleDetailForm', 'onReload', ['register_state'=>'false']);
        
        // create the page container
        $container = new TVBox;
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
        $data->customer_name = $param['customer_name'];
        $this->form->setData($data);
    }
    
    /**
     * Clear form
     * @param $param URL parameters
     */
    function onClear($param)
    {
        $this->form->clear();
        TSession::setValue('sale_items', array());
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
            
            if (isset($param['id']))
            {
                $key = $param['id'];
                
                $object = new Sale($key);
                $sale_items = $object->getSaleItems();
                
                $session_items = array();
                foreach( $sale_items as $item )
                {
                    $session_items[$item->product_id] = $item->toArray();
                    $session_items[$item->product_id]['product_id'] = $item->product_id;
                    $session_items[$item->product_id]['product_name'] = $item->product->description;
                    $session_items[$item->product_id]['product_amount'] = $item->amount;
                    $session_items[$item->product_id]['product_price'] = $item->sale_price;
                    $session_items[$item->product_id]['product_discount'] = $item->discount;
                }
                TSession::setValue('sale_items', $session_items);
                
                $this->form->setData($object); // fill the form with the active record data
                
                TTransaction::close(); // close transaction
            }
            else
            {
                $this->form->clear();
                TSession::setValue('sale_items', null);
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
                    $item->sale_price  = $sale_item['product_price'];
                    $item->amount      = $sale_item['product_amount'];
                    $item->discount    = $sale_item['product_discount'];
                    $item->total       = ($sale_item['product_price'] * $sale_item['product_amount']) - $sale_item['product_amount'];
                    
                    $sale->addSaleItem($item);
                    $total += ($item->sale_price * $item->amount) - (float) $item->discount;
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
}
