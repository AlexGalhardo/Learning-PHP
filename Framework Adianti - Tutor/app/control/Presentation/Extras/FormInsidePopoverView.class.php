<?php
/**
 * FormInsidePopoverView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormInsidePopoverView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        parent::include_css('app/resources/myframe.css');
        
        $button = new TButton('bt4a');
        $button->setImage('fa:list-alt blue');
        $button->setLabel('Open form inside popover');
        
        $action = new TAction(array('FormSessionDataView', 'onEdit'));
        // $action->setParameter('key', '1');
        
        $button->popover    = 'true';
        $button->popside    = 'bottom';
        $button->poptitle   = 'Pop title 1';
        $button->poptrigger = 'click';
        $button->popaction  = $action->serialize(FALSE);
        
        $frame = new TFrame;
        $frame->setLegend('Form inside popover');
        $frame->add($button);
        
        parent::add($frame);
    }
}
