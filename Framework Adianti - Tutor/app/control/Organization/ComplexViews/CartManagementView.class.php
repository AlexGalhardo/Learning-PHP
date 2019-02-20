<?php
class CartManagementView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->width = '100%';
        
        // add the columns
        $this->datagrid->addQuickColumn('ID',          'id',          'left',  '10%');
        $this->datagrid->addQuickColumn('Description', 'description', 'left',  '30%');
        $this->datagrid->addQuickColumn('Amount',      'amount',      'right', '30%');
        $this->datagrid->addQuickColumn('Price',       'sale_price',  'right', '30%');
        
        // add the actions
        $this->datagrid->addQuickAction('Delete', new TDataGridAction(array($this, 'onDelete')), 'id', 'ico_delete.png');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        $back = new TActionLink('Back', new TAction(array($this, 'onGoToCatalog')), 'black', null, null, 'fa:arrow-circle-o-left red');
        $back->addStyleClass('btn btn-default btn-sm');
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->addFooter($back);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'ProductCatalogView'));
        $vbox->add($panel);
        
        parent::add($vbox);
    }
    
    /**
     * Delete an item from cart items
     */
    public function onDelete( $param )
    {
        $cart_items = TSession::getValue('cart_items');
        unset($cart_items[ $param['key'] ]);
        TSession::setValue('cart_items', $cart_items);
        
        $this->onReload();
    }
    
    /**
     * Reload the cart list
     */
    public function onReload()
    {
        $cart_items = TSession::getValue('cart_items');
        
        try
        {
            TTransaction::open('samples');
            $this->datagrid->clear();
            foreach ($cart_items as $id => $amount)
            {
                $product = new Product($id);
                
                $item = new StdClass;
                $item->id          = $product->id;
                $item->description = $product->description;
                $item->amount      = $amount;
                $item->sale_price  = $product->sale_price;
                
                $this->datagrid->addItem( $item );
            }
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }

    /**
     * Go back to the catalog
     */
    public function onGoToCatalog()
    {
        TApplication::loadPage('ProductCatalogView');
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
