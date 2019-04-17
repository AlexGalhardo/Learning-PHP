<?php
/**
 * DatagridMathView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridMathView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        
        // create the datagrid columns
        $code        = new TDataGridColumn('code',        'Code',        'right');
        $description = new TDataGridColumn('description', 'Description', 'left');
        $amount      = new TDataGridColumn('amount',      'Amount',      'center');
        $price       = new TDataGridColumn('price',       'Price',       'right');
        $discount    = new TDataGridColumn('discount',    'Discount',    'right');
        $subtotal    = new TDataGridColumn('= {amount} * ( {price} - {discount} )', 'Subtotal', 'right');
        
        // add the columns to the datagrid
        $this->datagrid->addColumn($code);
        $this->datagrid->addColumn($description);
        $this->datagrid->addColumn($amount);
        $this->datagrid->addColumn($price);
        $this->datagrid->addColumn($discount);
        $this->datagrid->addColumn($subtotal);
        
        // define format function
        $format_value = function($value) {
            if (is_numeric($value)) {
                return 'R$ '.number_format($value, 2, ',', '.');
            }
            return $value;
        };
        
        $price->setTransformer( $format_value );
        $discount->setTransformer( $format_value );
        $subtotal->setTransformer( $format_value );
        
        
        // define totals
        $subtotal->setTotalFunction( function($values) {
            return array_sum((array) $values);
        });
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($panel = TPanelGroup::pack(_t('Datagrid calculations'), $this->datagrid, 'footer'));
        $panel->getBody()->style = 'overflow-x:auto';
        
        parent::add($vbox);
    }
    
    /**
     * Load the data into the datagrid
     */
    function onReload()
    {
        $this->datagrid->clear();
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code        = '1';
        $item->description = 'Chocolate';
        $item->amount      = 10;
        $item->price       = 1;
        $item->discount    = 0.05;
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code          = '2';
        $item->description   = 'Milk';
        $item->amount        = 20;
        $item->price         = 2;
        $item->discount      = 0.5;
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code          = '3';
        $item->description   = 'Beer';
        $item->amount        = 10;
        $item->price         = 4;
        $item->discount      = 1;
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code          = '4';
        $item->description   = 'Cofee';
        $item->amount        = 20;
        $item->price         = 2.5;
        $item->discount      = 0.5;
        $this->datagrid->addItem($item);
    }
    
    /**
     * shows the page
     */
    function show()
    {
        $this->onReload();
        parent::show();
    }
}
