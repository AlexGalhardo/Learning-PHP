<?php
/**
 * DatagridCacheView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DatagridCacheView extends TPage
{
    private $datagrid;
    private $result;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        
        // add the columns
        $this->datagrid->addQuickColumn('Variable',  'key',      'left', '25%');
        $this->datagrid->addQuickColumn('Hits',      'nhits',    'left', '25%');
        $mt = $this->datagrid->addQuickColumn('Mod. Time', 'mtime',    'left', '25%');
        $this->datagrid->addQuickColumn('Memory',    'mem_size', 'left', '25%');
        
        $mt->setTransformer( array($this, 'formatTime'));
        $this->datagrid->addQuickAction('View',   new TDataGridAction(array($this, 'onView')),   'key', 'ico_find.png');
        
        $this->datagrid->createModel();
        
        $panel = new TPanelGroup('Cache');
        $panel->add($this->datagrid);
        parent::add($panel);
    }
    
    /**
     * Transform timestamp to human date
     */
    public function formatTime($data)
    {
        return date('Y-m-d H:i:s', $data);
    }
    
    /**
     * Load the data into the datagrid
     */
    function onReload()
    {
        $this->datagrid->clear();
        
        $cache = apcu_cache_info();
        
        foreach ($cache['cache_list'] as $entry)
        {
            // add an regular object to the datagrid
            $item = new StdClass;
            $item->key       = isset($entry['key']) ? $entry['key'] : $entry['info'];
            $item->nhits     = isset($entry['nhits']) ? $entry['nhits'] : $entry['num_hits'];
            $item->mtime     = isset($entry['mtime']) ? $entry['mtime'] : $entry['modification_time'];
            $item->mem_size  = $entry['mem_size'];
            $this->datagrid->addItem($item);
        }
    }
    
    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    public static function onView($param)
    {
        $div = new TElement('div');
        $div->style = 'border:1px solid black; font-family: Monospace; padding: 40px; margin: 20px;';
        $div->add( str_replace("\n", '<br>', print_r(unserialize(apcu_fetch( $param['key'] )), TRUE)) );
        $win = TWindow::create('Record detail', 0.8, 0.8);
        $win->add( $div );
        $win->show();
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
