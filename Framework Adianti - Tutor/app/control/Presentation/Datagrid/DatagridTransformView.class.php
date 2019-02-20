<?php
/**
 * DatagridTransformView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridTransformView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        
        // create the datagrid columns
        $code  = new TDataGridColumn('code',        'Code',        'right', '20%');
        $desc  = new TDataGridColumn('description', 'Description', 'left',  '40%');
        $stock = new TDataGridColumn('stock',       'Stock',       'right', '40%');
        
        $stock->setTransformer(array($this, 'formatSalary'));
        
        // add the columns to the datagrid
        $this->datagrid->addColumn($code);
        $this->datagrid->addColumn($desc);
        $this->datagrid->addColumn($stock);
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrid formatting'), $this->datagrid, 'footer'));

        parent::add($vbox);
    }
    
    /**
     * Format salary
     */
    public function formatSalary($stock, $object, $row)
    {
        $number = number_format($stock, 2, ',', '.');
        if ($stock > 0)
        {
            return "<span style='color:blue'>$number</span>";
        }
        else
        {
            $row->style = "background: #FFF9A7";
            return "<span style='color:red'>$number</span>";
        }
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
        $item->stock       = 4500;
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code          = '2';
        $item->description   = 'Milk';
        $item->stock         = 2300;
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code          = '3';
        $item->description   = 'Beer';
        $item->stock         = -500;
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code          = '4';
        $item->description   = 'Cofee';
        $item->stock         = 2500;
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
