<?php
/**
 * SingleWindowView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SingleWindowView extends TWindow
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        parent::setTitle('Window');
        
        // with: 500, height: automatic
        parent::setSize(0.6, null); // use 0.6, 0.4 (for relative sizes 60%, 40%)
        
        // create the HTML Renderer
        $this->html = new THtmlRenderer('app/resources/page.html');
        
        $replaces = [];
        $replaces['title']  = 'Panel title';
        $replaces['footer'] = 'Panel footer';
        $replaces['name']   = 'Someone famous';
        
        // replace the main section variables
        $this->html->enableSection('main', $replaces);
        
        parent::add($this->html);            
    }
}
