<?php
/**
 * DatagridActionGroupView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridActionGroupView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        
        // create the datagrid columns
        $code       = new TDataGridColumn('code',    'Code',    'right',  '10%');
        $name       = new TDataGridColumn('name',    'Name',    'left',   '30%');
        $address    = new TDataGridColumn('address', 'Address', 'left',   '30%');
        $telephone  = new TDataGridColumn('fone',    'Phone',   'left',   '30%');
        
        $telephone->setDataProperty('hiddable', 400);
        
        // add the columns to the datagrid
        $this->datagrid->addColumn($code);
        $this->datagrid->addColumn($name);
        $this->datagrid->addColumn($address);
        $this->datagrid->addColumn($telephone);
        
        // creates two datagrid actions
        $action1 = new TDataGridAction(array($this, 'onView'));
        $action1->setLabel('View name');
        $action1->setImage('fa:search #7C93CF');
        $action1->setField('name');
        
        $action2 = new TDataGridAction(array($this, 'onDelete'));
        $action2->setLabel('Try to delete');
        $action2->setImage('bs:remove red');
        $action2->setField('code');
        
        $action3 = new TDataGridAction(array($this, 'onView'));
        $action3->setLabel('View address');
        $action3->setImage('bs:hand-right green');
        $action3->setField('address');
        
        $action_group = new TDataGridActionGroup('Actions ', 'bs:th');
        
        $action_group->addHeader('Available Options');
        $action_group->addAction($action1);
        $action_group->addAction($action2);
        $action_group->addSeparator();
        $action_group->addHeader('Another Options');
        $action_group->addAction($action3);
        
        // add the actions to the datagrid
        $this->datagrid->addActionGroup($action_group);
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrids Actions group'), $this->datagrid, 'footer'));

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
        $key=$param['key'];
        new TMessage('error', "The register $key may not be deleted");
    }
    
    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    function onView($param)
    {
        // get the parameter and shows the message
        $key=$param['key'];
        new TMessage('info', "The information is : $key");
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
