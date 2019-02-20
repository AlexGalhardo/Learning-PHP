<?php
/**
 * DatagridInputDialogView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridInputDialogView extends TPage
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
        
        // add the actions
        $this->datagrid->addQuickAction('Input',   new TDataGridAction(array($this, 'onInputDialog')), 'name', 'fa:external-link');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrids with input dialog'), $this->datagrid, 'footer'));

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
     * Open an input dialog
     */
    public function onInputDialog( $param )
    {
        $name   = new TEntry('name');
        $amount = new TEntry('amount');
        $name->setValue($param['key']);
        
        $form = new TForm('input_form');
        $form->style = 'padding:20px';
        
        $table = new TTable;
        $table->addRowSet( new TLabel('Name: '), $name );
        $table->addRowSet( $lbl = new TLabel('Amount: '), $amount );
        $lbl->setFontColor('red');
        
        $form->setFields(array($name, $amount));
        $form->add($table);
        
        // show the input dialog
        $action = new TAction(array($this, 'onConfirm'));
        $action->setParameter('stay-open', 1);
        new TInputDialog('Input dialog', $form, $action, 'Confirm');
    }
    
    /**
     * Show the input dialog data
     */
    public static function onConfirm( $param )
    {
        if (isset($param['amount']) AND $param['amount']) // validate required field
        {
            new TMessage('info', "Name: ". $param['name'] . '; Amount: ' . $param['amount'], new TAction(array('DatagridInputDialogView', 'onReload')));
        }
        else
        {
            new TMessage('error', 'Amount is required');
        }
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
