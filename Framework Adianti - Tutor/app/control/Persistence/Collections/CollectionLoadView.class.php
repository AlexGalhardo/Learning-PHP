<?php
/**
 * CollectionLoadView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CollectionLoadView extends TPage
{
    public function __construct()
    {
        // parent classs constructor
        parent::__construct();
        
        $config = AdiantiApplicationConfig::get();
        ini_set('highlight.comment', $config['highlight']['comment']);
        ini_set('highlight.default', $config['highlight']['default']);
        ini_set('highlight.html',    $config['highlight']['html']);
        ini_set('highlight.keyword', $config['highlight']['keyword']);
        ini_set('highlight.string',  $config['highlight']['string']);
        
        // scroll to put the source inside
        $wrapper = new TElement('div');
        $wrapper->class = 'sourcecodewrapper';
        
        $source = new TSourceCode;
        $source->loadFile('app/resources/Persistence/Collections/CollectionLoad.php');
        $wrapper->add($source);
        
        // wrap the page content
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($wrapper);
        parent::add($vbox);
    }
}
