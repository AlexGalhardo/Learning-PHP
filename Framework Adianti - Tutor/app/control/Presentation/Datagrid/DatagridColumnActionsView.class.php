<?php
/**
 * DatagridColumnActionsView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridColumnActionsView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->width = '100%';
        
        // create the datagrid columns
        $code       = new TDataGridColumn('code',    'Code',    'left',   '10%');
        $name       = new TDataGridColumn('name',    'Name',    'left',   '30%');
        $address    = new TDataGridColumn('address', 'Address', 'left',   '30%');
        $telephone  = new TDataGridColumn('fone',    'Phone',   'center', '30%');
        
        // add the columns to the datagrid
        $this->datagrid->addColumn($code);
        $this->datagrid->addColumn($name);
        $this->datagrid->addColumn($address);
        $this->datagrid->addColumn($telephone);
        
        $action1= new TAction(array($this, 'onColumnAction'));
        $action1->setParameter('column', 'code');
        $code->setAction($action1);
        
        $action2= new TAction(array($this, 'onColumnAction'));
        $action2->setParameter('column', 'name');
        $name->setAction($action2);
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrid column actions'), $this->datagrid, 'footer'));

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
     * method onColumnAction()
     * Executed when the user clicks at the column title
     */
    function onColumnAction($param)
    {
        // get the parameter and shows the message
        $col = $param['column'];
        new TMessage('info', "You clicked at the column $col");
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
