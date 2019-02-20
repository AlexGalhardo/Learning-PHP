<?php
/**
 * DatagridProgressView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridProgressView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->style = 'width: 100%';
        
        // add the columns
        $this->datagrid->addQuickColumn('Code',  'code', 'center', '20%');
        $this->datagrid->addQuickColumn('Task',  'task', 'left',   '40%');
        $column = $this->datagrid->addQuickColumn('Percentual', 'percent', 'center', '40%');
        
        // define the transformer method over image
        $column->setTransformer( function($percent) {
            $bar = new TProgressBar;
            $bar->setMask('Task <b>{value}</b>% complete');
            $bar->setValue($percent);
            
            if ($percent == 100) {
                $bar->setClass('success');
            }
            else if ($percent >= 75) {
                $bar->setClass('info');
            }
            else if ($percent >= 50) {
                $bar->setClass('warning');
            }
            else {
                $bar->setClass('danger');
            }
            return $bar;
        });
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrid with progress bar'), $this->datagrid, 'footer'));

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
        $item->code      = '1';
        $item->task      = 'Install Ubuntu Server';
        $item->percent   = '100';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code      = '2';
        $item->task      = 'Install Apache';
        $item->percent   = '80';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code      = '3';
        $item->task      = 'Install PHP';
        $item->percent   = '60';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code      = '4';
        $item->task      = 'Install PostgreSQL';
        $item->percent   = '40';
        $this->datagrid->addItem($item);
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
