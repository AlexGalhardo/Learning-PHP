<?php
/**
 * DatagridWindowView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridWindowView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width:100%';
        $this->datagrid->setHeight(320);
        
        // add the columns
        $this->datagrid->addQuickColumn('Code',    'code',    'right', '10%' );
        $this->datagrid->addQuickColumn('Name',    'name',    'left',  '30%' );
        $this->datagrid->addQuickColumn('Address', 'address', 'left',  '30%' );
        $this->datagrid->addQuickColumn('Phone',   'fone',    'left',  '30%' );
        
        // add the actions
        $this->datagrid->addQuickAction('View',   new TDataGridAction(array($this, 'onView')), 'name', 'fa:search-plus');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrids with new Window'), $this->datagrid, 'footer'));

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
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '2';
        $item->name     = 'Julia Haubert';
        $item->address  = 'Rua Expedicionarios';
        $item->fone     = '2222-2222';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '3';
        $item->name     = 'Carlos Ranzi';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '3333-3333';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '4';
        $item->name     = 'Daline DallOglio';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '4444-4444';
        $this->datagrid->addItem($item);
    }
    
    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    function onView($param)
    {
        $key = $param['key'];
        
        $win = TWindow::create('Detail', 0.5, 0.5);
        $win->add("<br> &nbsp; You have clicked at <b>$key</b>");
        $win->show();
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
