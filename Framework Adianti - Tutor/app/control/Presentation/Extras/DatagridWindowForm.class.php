<?php
/**
 * DatagridWindowForm
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridWindowForm extends TPage
{
    private $form;
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->setHeight(320);
        
        // add the columns
        $this->datagrid->addQuickColumn('Code',    'code',    'right', '20%');
        $this->datagrid->addQuickColumn('Name',    'name',    'left',  '80%');
        
        // add the actions
        $this->datagrid->addQuickAction('Delete', new TDataGridAction(array($this, 'onDelete')), 'code', 'fa:trash red');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        $link = new TActionLink('Add', new TAction(array('NewWindowForm', 'onLoad')), 'green', 10, null, 'fa:plus-circle');
        $link->class = 'btn btn-default';
        $link->style .= ';margin-top: 4px';
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack('', $this->datagrid));
        $vbox->add($link);
        
        parent::add($vbox);
    }
    
    public function onReload()
    {
        $objects = TSession::getValue('session_contacts');
        
        $this->datagrid->clear();
        if ($objects)
        {
            foreach ($objects as $object)
            {
                $this->datagrid->addItem($object);
            }
        }
    }
    
    public function onDelete( $param )
    {
        $key = $param['key'];
        $objects = TSession::getValue('session_contacts');
        unset($objects[$key]);
        TSession::setValue('session_contacts', $objects);
        
        $this->onReload();
    }
    
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
