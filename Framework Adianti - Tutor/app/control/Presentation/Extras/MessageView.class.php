<?php
/**
 * MessageView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MessageView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // HERE: The #id of container of this page view
        $this->adianti_target_container = 'message_area';
        
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        
        // add the columns
        $this->datagrid->addQuickColumn('Subject', 'subject',    'left');
        $this->datagrid->addQuickColumn('From', 'who',    'left');
        $this->datagrid->addQuickColumn('Date', 'date',    'left');
        $this->datagrid->createModel();
        
        $panel = new TPanelGroup;
        $panel->style='margin:2px';
        $panel->add($this->datagrid);
        
        parent::add($panel);
    }
    
    public function onLoad($param)
    {
        if ($param['folder'] == 'Inbox')
        {
            $this->datagrid->addItem( (object) ['subject' => 'Inbox message 1',
                                                'who' => 'From 1',
                                                'date' => date('Y-m-d')]);
            
            $this->datagrid->addItem( (object) ['subject' => 'Inbox message 2',
                                                'who' => 'From 2',
                                                'date' => date('Y-m-d')]);
        }
        if ($param['folder'] == 'Sent')
        {
            $this->datagrid->addItem( (object) ['subject' => 'Sent message 1',
                                                'who' => 'To 1',
                                                'date' => date('Y-m-d')]);
            
            $this->datagrid->addItem( (object) ['subject' => 'Sent message 2',
                                                'who' => 'To 2',
                                                'date' => date('Y-m-d')]);
        }
    }
}
