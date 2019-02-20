<?php
/**
 * InboxView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class InboxView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        $action = new TDataGridAction(array('MessageView', 'onLoad'));
        $action->setParameter('register_state', 'false');
        
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->addQuickColumn('Folder', 'folder', 'left');
        $this->datagrid->addQuickAction('View', $action, 'folder', 'fa:folder-open-o');
        $this->datagrid->createModel();
        
        $this->datagrid->addItem( (object) ['folder' => 'Inbox']);
        $this->datagrid->addItem( (object) ['folder' => 'Sent']);
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->style='width:150px;float:left;margin:2px';
        
        // HERE: Prepare an area (message_area) to render MessageView
        $message_area = new TElement('div');
        $message_area->id = 'message_area';
        $message_area->style = "float:left;width:70%;height:200px;border:1px dashed orange";
        
        $div = new TElement('div');
        $div->style = 'width:90%;float:left';
        $div->add( $panel );
        $div->add( $message_area );
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($div);
        
        parent::add($vbox);
    }
}
