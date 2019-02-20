<?php
/**
 * Product catalog
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ProductCatalogView extends TPage
{
    private $html;
    private $pageNavigation;
    
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        // load the styles
        TPage::include_css('app/resources/catalog.css');
        
        // create the HTML Renderer
        $this->html = new THtmlRenderer('app/resources/catalog.html');

        // define replacements for the main section
        $replace = array();
        
        // replace the main section variables
        $this->html->enableSection('main', $replace);
        
        $this->enableManagement();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->html);
        $vbox->add($this->pageNavigation)->style = 'clear:both';

        parent::add($vbox);
    }
    
    /**
     * Enable or not the 'manage' section
     */
    public function enableManagement()
    {
        if (is_array(TSession::getValue('cart_items')) AND count(TSession::getValue('cart_items')) > 0)
        {
            $this->html->enableSection('manage');
        }
    }
    
    /**
     * Executed when the user clicks at click to buy button
     */
    public function onBuyClick( $param )
    {
        $cart_items = TSession::getValue('cart_items');
        if (isset($cart_items[ $param['product_id'] ]))
        {
            $cart_items[ $param['product_id'] ] ++;
        }
        else
        {
            $cart_items[ $param['product_id'] ] = 1;
        }
        
        TSession::setValue('cart_items', $cart_items);
        
        $this->enableManagement();
        
        $posAction = new TAction( array('CartManagementView', 'onReload') );
        new TMessage('info', 'You have chosen the product: ' . $param['product_id'], $posAction);
    }
    
    /**
     * Fill the html template with objects
     */
    public function onReload( $param )
    {
        try
        {
            $limit = 8;
            
            // load the products
            TTransaction::open('samples');
            $criteria = new TCriteria;
            $criteria->add(new TFilter('photo_path', '<>', ''));
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            $products = Product::getObjects($criteria);
            
            $criteria->resetProperties(); // reset the criteria for record count
            $count= Product::countObjects($criteria);
            
            TTransaction::close();
            
            $replace_detail = array();
            if ($products)
            {
                // iterate products
                foreach ($products as $product)
                {
                    $replace_detail[] = $product->toArray(); // array of replacements
                }
            }
            
            // enable products section as repeatable
            $this->html->enableSection('products', $replace_detail, TRUE);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    public function show()
    {
        $this->onReload( func_get_arg(0) );
        parent::show();
    }
}
