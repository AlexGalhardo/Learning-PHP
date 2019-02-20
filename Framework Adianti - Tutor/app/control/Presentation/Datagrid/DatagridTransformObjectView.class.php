<?php
/**
 * DatagridTransformObjectView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridTransformObjectView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        
        // create the datagrid columns
        $country     = new TDataGridColumn('country',     'Country',        'left', '25%');
        $format      = new TDataGridColumn('format',      'Format',         'left', '25%');
        $origin_date = new TDataGridColumn('origin_date', 'Original date',  'left', '25%');
        $transf_date = new TDataGridColumn('transf_date', 'Converted date', 'left', '25%');
        
        $transf_date->setTransformer(array($this, 'formatDate'));
        
        // add the columns to the datagrid
        $this->datagrid->addColumn($country);
        $this->datagrid->addColumn($format);
        $this->datagrid->addColumn($origin_date);
        $this->datagrid->addColumn($transf_date);
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add(TPanelGroup::pack(_t('Datagrid date conversion'), $this->datagrid, 'footer'));

        parent::add($vbox);
    }
    
    /**
     * Format the date according to the country
     */
    public function formatDate($transf_date, $object)
    {
        $date = new DateTime($object->origin_date);
        return $date->format($object->format);
    }
    
    /**
     * Load the data into the datagrid
     */
    function onReload()
    {
        $this->datagrid->clear();
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->country      = 'Brazil';
        $item->format       = 'd/m/Y';
        $item->origin_date  = '2010-10-01';
        $item->transf_date  = '';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->country      = 'Armenia';
        $item->format       = 'd.m.Y';
        $item->origin_date  = '2010-10-01';
        $item->transf_date  = '';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->country      = 'Croatia';
        $item->format       = 'd. m. Y.';
        $item->origin_date  = '2010-10-01';
        $item->transf_date  = '';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->country      = 'Finland';
        $item->format       = 'd.m.Y';
        $item->origin_date  = '2010-10-01';
        $item->transf_date  = '';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->country      = 'Lithuania';
        $item->format       = 'd-m-Y';
        $item->origin_date  = '2010-10-01';
        $item->transf_date  = '';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->country      = 'United States';
        $item->format       = 'm/d/Y';
        $item->origin_date  = '2010-10-01';
        $item->transf_date  = '';
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
