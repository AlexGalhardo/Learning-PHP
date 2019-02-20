<?php
/**
 * Page center
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PageCenterView extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        // create the HTML Renderer
        $this->html = new THtmlRenderer('app/resources/page_center.html');
        
        try
        {
            // enable main section
            $this->html->enableSection('main');
            
            $panel = new TPanelGroup(_t('Page center'));
            $panel->add($this->html);
            
            // wrap the page content using vertical box
            $vbox = new TVBox;
            $vbox->style = 'width: 100%';
            $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
            $vbox->add($panel);
            
            parent::add($vbox);
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Load page by action
     */
    public static function onLoadPage($param)
    {
        AdiantiCoreApplication::loadPage('CustomerDataGridView');
    }
    
    /**
     * Load window by action
     */
    public static function onLoadWindow($param)
    {
        AdiantiCoreApplication::loadPage('WindowPDFView', null, ['register_state' => 'false']);
    }
    
    /**
     * Instantiate an existing window
     */
    public static function onInstantiateWindow($param)
    {
        $window = WindowPDFView::create('PDF', 0.8, 0.8);
        $window->show();
    }
    
    /**
     * Create an ondemand window
     */
    public static function onCreateWindow($param)
    {
        $window = TWindow::create('On demand', 0.8, 0.8);
        
        // create the HTML Renderer
        $html = new THtmlRenderer('app/resources/page.html');
        
        $replaces = [];
        $replaces['title']  = 'Panel title';
        $replaces['footer'] = 'Panel footer';
        $replaces['name']   = 'Someone famous';
        $html->enableSection('main', $replaces);
        
        $window->add($html);
        $window->show();
    }
}
