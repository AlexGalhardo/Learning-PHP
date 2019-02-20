<?php
/**
 * DatagridDetailView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridDetailView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->setHeight(320);
        
        // add the columns
        $this->datagrid->addQuickColumn('Code',    'code',    'right', '10%');
        $this->datagrid->addQuickColumn('Name',    'name',    'left',  '30%');
        $this->datagrid->addQuickColumn('Address', 'address', 'left',  '30%');
        $this->datagrid->addQuickColumn('Phone',   'fone',    'left',  '30%');
        
        $this->datagrid->addQuickAction('View', new TDataGridAction(array($this, 'onShowDetail')), 'code', 'ico_view.png');
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack('', $this->datagrid));

        parent::add($vbox);
    }
    
    /**
     * Load the data into the datagrid
     */
    function onReload( $param )
    {
        $this->datagrid->clear();
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '1';
        $item->name     = 'Fábio Locatelli';
        $item->address  = 'Rua Expedicionario';
        $item->fone     = '1111-1111';
        $row = $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '2';
        $item->name     = 'Julia Haubert';
        $item->address  = 'Rua Expedicionarios';
        $item->fone     = '2222-2222';
        $row = $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '3';
        $item->name     = 'Carlos Ranzi';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '3333-3333';
        $row = $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '4';
        $item->name     = 'Daline DallOglio';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '4444-4444';
        $row = $this->datagrid->addItem($item);
    }
    
    /**
     * Show record detail
     */
    public function onShowDetail( $param )
    {
        // get row position
        $pos = $this->datagrid->getRowIndex('code', $param['key']);
        
        // get row by position
        $current_row = $this->datagrid->getRow($pos);
        $current_row->style = "background-color: #8D8BC8; color:white; text-shadow:none";
        
        // create a new row
        $row = new TTableRow;
        $row->style = "background-color: #E0DEF8";
        $row->addCell('');
        $cell = $row->addCell('In this space, you can add any detail<br> content about the selected record');
        $cell->colspan = 4;
        $cell->style='padding:10px;';
        
        // insert the new row
        $this->datagrid->insert($pos +1, $row);
    }
    
    /**
     * shows the page
     */
    function show()
    {
        $this->onReload( func_get_arg(0) );
        parent::show();
    }
}
