<?php
/**
 * DialogErrorView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DialogErrorView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // show the message dialog
        new TMessage('error', 'Error message');
        
        parent::add(new TXMLBreadCrumb('menu.xml', __CLASS__));
    }
}
