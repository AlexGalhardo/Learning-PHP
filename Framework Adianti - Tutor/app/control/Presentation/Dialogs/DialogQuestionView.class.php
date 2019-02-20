<?php
/**
 * DialogQuestionView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DialogQuestionView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // create two actions
        $action1 = new TAction(array($this, 'onAction1'));
        $action2 = new TAction(array($this, 'onAction2'));

        // define os parâmetros de cada ação
        $action1->setParameter('parameter', 1);
        $action2->setParameter('parameter', 2);
        
        // shows the question dialog
        new TQuestion('Do you really want to perform this operation ?', $action1, $action2);
        
        parent::add(new TXMLBreadCrumb('menu.xml', __CLASS__));
    }
    
    public static function onAction1($param)
    {
        new TMessage('info', "You have choose the first option. Parameter value {$param['parameter']}");
    }
    
    public static function onAction2($param)
    {
        new TMessage('info', "You have choose the second option. Parameter value {$param['parameter']}");
    }
}
