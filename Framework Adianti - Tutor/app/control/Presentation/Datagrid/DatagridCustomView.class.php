<?php
/**
 * DatagridCustomView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridCustomView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new TDataGrid;
        
        // create the datagrid columns
        $code       = new TDataGridColumn('code',    'Code',    'center', '10%');
        $name       = new TDataGridColumn('name',    'Name',    'left',   '30%');
        $address    = new TDataGridColumn('address', 'Address', 'left',   '30%');
        $telephone  = new TDataGridColumn('fone',    'Phone',   'left',   '30%');
        
        // add the columns to the datagrid
        $this->datagrid->addColumn($code);
        $this->datagrid->addColumn($name);
        $this->datagrid->addColumn($address);
        $this->datagrid->addColumn($telephone);
        
        $code->title = 'Here is the code';
        $name->title = 'Here is the name';
        $address->title = 'Here is the address';
        $telephone->title = 'Here is the telephone';
        
        // creates two datagrid actions
        $action1 = new TDataGridAction(array($this, 'onView'));
        $action1->setLabel('View');
        $action1->setImage('fa:search blue');
        $action1->setFields(['code', 'name']);
        
        $action2 = new TDataGridAction(array($this, 'onDelete'));
        $action2->setLabel('Delete');
        $action2->setImage('fa:trash red');
        $action2->setField('code');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->datagrid);

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
     * method onDelete()
     * Executed when the user clicks at the delete button
     */
    function onDelete($param)
    {
        // get the parameter and shows the message
        $code = $param['code'];
        new TMessage('error', "The register $code may not be deleted");
    }
    
    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    function onView($param)
    {
        // get the parameter and shows the message
        $code = $param['code'];
        $name = $param['name'];
        new TMessage('info', "The code is: <b>$code</b> <br> The name is : <b>$name</b>");
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
