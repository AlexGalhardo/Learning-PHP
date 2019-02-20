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
class DatagridCheckView extends TPage
{
    private $form;
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new TForm;
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->disableDefaultClick(); // important!
        
        $panel = new TPanelGroup(_t('Datagrids with Checkbutton'));
        $panel->add($this->datagrid)->style = 'overflow-x:auto';
        $this->form->add($panel);
        
        // add the columns
        $this->datagrid->addQuickColumn('Check',   'check',   'right', 70);
        $this->datagrid->addQuickColumn('Code',    'code',    'right', 70);
        $this->datagrid->addQuickColumn('Name',    'name',    'left');
        $this->datagrid->addQuickColumn('Address', 'address', 'left');
        $this->datagrid->addQuickColumn('Phone',   'fone',    'left');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // creates the action button
        $button = TButton::create('action1', [$this, 'onSave'], 'Save', 'fa:save green');
        $this->form->addField($button);
        $panel->addFooter($button);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

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
        $item->check    = new TCheckButton('check1');
        $item->check->setIndexValue('on');
        $item->code     = '1';
        $item->name     = 'Fábio Locatelli';
        $item->address  = 'Rua Expedicionario';
        $item->fone     = '1111-1111';
        $this->datagrid->addItem($item);
        $this->form->addField($item->check); // important!
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->check  = new TCheckButton('check2');
        $item->check->setIndexValue('on');
        $item->code     = '2';
        $item->name     = 'Julia Haubert';
        $item->address  = 'Rua Expedicionarios';
        $item->fone     = '2222-2222';
        $this->datagrid->addItem($item);
        $this->form->addField($item->check); // important!
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->check  = new TCheckButton('check3');
        $item->check->setIndexValue('on');
        $item->code     = '3';
        $item->name     = 'Carlos Ranzi';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '3333-3333';
        $this->datagrid->addItem($item);
        $this->form->addField($item->check); // important!
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->check  = new TCheckButton('check4');
        $item->check->setIndexValue('on');
        $item->code     = '4';
        $item->name     = 'Daline DallOglio';
        $item->address  = 'Rua Oliveira';
        $item->fone     = '4444-4444';
        $this->datagrid->addItem($item);
        $this->form->addField($item->check); // important!
    }
    
    /**
     * Simulates an save button
     * Show the form content
     */
    public function onSave($param)
    {
        $data = $this->form->getData(); // optional parameter: active record class
        
        // put the data back to the form
        $this->form->setData($data);
        
        // creates a string with the form element's values
        $message = 'Check 1 : ' . $data->check1 . '<br>';
        $message.= 'Check 2 : ' . $data->check2 . '<br>';
        $message.= 'Check 3 : ' . $data->check3 . '<br>';
        $message.= 'Check 4 : ' . $data->check4 . '<br>';
        
        // show the message
        new TMessage('info', $message);
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
