<?php
/**
 * AlertView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AlertView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        parent::add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        parent::add(new TAlert('info', 'Info alert'));
        parent::add(new TAlert('success', 'Success alert'));
        parent::add(new TAlert('warning', 'Warning alert'));
        parent::add(new TAlert('danger', 'Danger alert'));
    }
}
