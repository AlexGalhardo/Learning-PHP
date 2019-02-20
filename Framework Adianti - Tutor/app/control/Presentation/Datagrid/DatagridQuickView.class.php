<?php
/**
 * DatagridQuickView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridQuickView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new TQuickGrid;
        
        // add the columns
        $this->datagrid->addQuickColumn('Code',    'code',    'center', '10%', new TAction(array($this, 'onColumnAction')), array('column', 'code'));
        $this->datagrid->addQuickColumn('Name',    'name',    'left', '30%', new TAction(array($this, 'onColumnAction')), array('column', 'name'));
        $this->datagrid->addQuickColumn('Address', 'address', 'left', '30%', new TAction(array($this, 'onColumnAction')), array('column', 'address'));
        $this->datagrid->addQuickColumn('Phone',   'fone',    'left', '30%', new TAction(array($this, 'onColumnAction')), array('column', 'fone'));
        
        $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        
        // add the actions
        $this->datagrid->addQuickAction('View',   new TDataGridAction(array($this, 'onView')),   'name', 'fa:search blue');
        $this->datagrid->addQuickAction('Delete', new TDataGridAction(array($this, 'onDelete')), 'code', 'fa:trash red');
        
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
     * method onColumnAction()
     * Executed when the user clicks at the column title
     */
    function onColumnAction($param)
    {
        // get the parameter and shows the message
        $key=$param['column'];
        new TMessage('info', "You clicked at the column $key");
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
        $name = $param['name'];
        new TMessage('info', "The name is : $name");
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
