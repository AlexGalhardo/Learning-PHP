<?php
/**
 * FormHtmlEditorView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormHtmlEditorView extends TPage
{
    private $form;
    
    /**
     * Page constructor
     */
    function __construct()
    {
        parent::__construct();
        
        // create the form
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle( _t('Html Editor') );
        
        // create the form fields
        $html = new THtmlEditor('html_text');
        $html->setSize( '100%', 200);
        
        $this->form->addFields( [$html] );
        $this->form->addAction('Show', new TAction(array($this, 'onShow')), 'fa:check-circle-o green');
        
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
        $this->form->setData($data); // put the data back to the form
        
        // show the message
        new TMessage('info', $data->html_text);
    }
}
