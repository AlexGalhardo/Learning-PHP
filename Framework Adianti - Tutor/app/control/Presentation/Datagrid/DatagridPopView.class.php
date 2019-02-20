<?php
/**
 * DatagridPopView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridPopView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width: 100%';
        
        // add the columns
        $code    = $this->datagrid->addQuickColumn('Code',    'code',    'right', '10%');
        $name    = $this->datagrid->addQuickColumn('Name',    'name',    'left',  '30%');
        $address = $this->datagrid->addQuickColumn('Address', 'address', 'left',  '30%');
        $phone   = $this->datagrid->addQuickColumn('Phone',   'fone',    'left',  '30%');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrids with popover'), $this->datagrid, 'footer'));

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
        $item->code     = '1';
        $item->name     = 'Fábio Locatelli';
        $item->address  = 'Rua Expedicionario';
        $item->fone     = '1111-1111';
        $row = $this->datagrid->addItem($item);
        
        $row->popover = 'true';
        $row->popside = 'top';
        $row->popcontent = "<table class='popover-table'><tr><td>Name</td><td>{$item->name}</td></tr><tr><td>Address</td><td>{$item->address}</td></tr></table>";
        $row->poptitle = 'Item details';
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '2';
        $item->name     = 'Julia Haubert';
        $item->address  = 'Rua Expedicionarios';
        $item->fone     = '2222-2222';
        $row = $this->datagrid->addItem($item);
        
        $row->popover = 'true';
        $row->popside = 'right';
        $row->popcontent = "<table class='popover-table'><tr><td>Name</td><td>{$item->name}</td></tr><tr><td>Address</td><td>{$item->address}</td></tr></table>";
        $row->poptitle = 'Item details';
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '3';
        $item->name     = 'Carlos Ranzi';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '3333-3333';
        $row = $this->datagrid->addItem($item);
        
        $row->popover = 'true';
        $row->popside = 'top';
        $row->popcontent = "<table class='popover-table'><tr><td>Name</td><td>{$item->name}</td></tr><tr><td>Address</td><td>{$item->address}</td></tr></table>";
        $row->poptitle = 'Item details';
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '4';
        $item->name     = 'Daline DallOglio';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '4444-4444';
        $row = $this->datagrid->addItem($item);
        
        $row->popover = 'true';
        $row->popside = 'bottom';
        $row->popcontent = "<table class='popover-table'><tr><td>Name</td><td>{$item->name}</td></tr><tr><td>Address</td><td>{$item->address}</td></tr></table>";
        $row->poptitle = 'Item details';
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
