<?php
/**
 * DatagridHScrollView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridHScrollView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'min-width: 1600px';
        
        // add the columns
        $this->datagrid->addQuickColumn('Code',    'code',    'center');
        $this->datagrid->addQuickColumn('Name',    'name',    'left');
        $this->datagrid->addQuickColumn('Address', 'address', 'left');
        $this->datagrid->addQuickColumn('Phone',   'fone',    'left');
        $this->datagrid->addQuickColumn('Email',   'email',   'left');
        $this->datagrid->addQuickColumn('City',    'city',    'left');
        $this->datagrid->addQuickColumn('State',   'state',   'left');
        $this->datagrid->addQuickColumn('Country', 'country', 'left');
        
        $action1 = new TDataGridAction(array($this, 'onView'));
        $this->datagrid->addQuickAction('View',   $action1, ['code', 'name'], 'fa:search blue');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        $panel = new TPanelGroup(_t('Horizontal Scrollable Datagrids'));
        $panel->add($this->datagrid);
        $panel->addFooter('footer');
        
        // turn on horizontal scrolling inside panel body
        $panel->getBody()->style = "overflow-x:auto;";
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($panel);

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
        $item->email    = 'fabio@email.com';
        $item->city     = 'Grand Lajeado';
        $item->state    = 'South Big River';
        $item->country  = 'Brazil';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '2';
        $item->name     = 'Julia Haubert';
        $item->address  = 'Rua Expedicionarios';
        $item->fone     = '2222-2222';
        $item->email    = 'julia@email.com';
        $item->city     = 'Grand Lajeado';
        $item->state    = 'South Big River';
        $item->country  = 'Brazil';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '3';
        $item->name     = 'Carlos Ranzi';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '3333-3333';
        $item->email    = 'carlos@email.com';
        $item->city     = 'Grand Lajeado';
        $item->state    = 'South Big River';
        $item->country  = 'Brazil';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '4';
        $item->name     = 'Daline DallOglio';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '4444-4444';
        $item->email    = 'daline@email.com';
        $item->city     = 'Grand Lajeado';
        $item->state    = 'South Big River';
        $item->country  = 'Brazil';
        $this->datagrid->addItem($item);
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
