<?php
/**
 * DesignContainerView Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DesignContainerView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new TForm;
        
        try
        {
            // UIBuilder object
            $ui = new TUIBuilder(500, 400);
            $ui->setController($this);
            $ui->setForm($this->form);
            
            // reads the xml form
            $ui->parseFile('app/forms/containers.form.xml');
            
            // add the TUIBuilder panel inside the form
            $this->form->add($ui);
            // set the form fields from the interface
            $this->form->setFields($ui->getFields());
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
}
