<?php
/**
 * FormReusableControl
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormReusableControl extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form view
        $this->form = new FormReusableView;
        
        // add a form action
        $this->form->addAction('Show', new TAction(array($this, 'onShow')), 'fa:check-circle-o');
                               
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        parent::add($vbox);
    }
    
    /**
     * Show the form content
     */
    public function onShow($param)
    {
        $data = $this->form->getData();
        $this->form->setData($data);

        new TMessage('info', str_replace(',', '<br>', json_encode($data)));
    }
}
