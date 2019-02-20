<?php
/**
 * Template View pattern implementation
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TemplateViewBasicView extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        // create the HTML Renderer
        $this->html = new THtmlRenderer('app/resources/customer.html');
        
        try
        {
            // look for customer 1
            TTransaction::open('samples');
            $customer = new Customer(1);
            
            // define replacements for the main section
            $replace = array();
            $replace['code']    = $customer->id;
            $replace['name']    = $customer->name;
            $replace['address'] = $customer->address;
            
            // replace the main section variables
            $this->html->enableSection('main', $replace);
            
            // define the replacements based on customer contacts
            $replace = array();
            foreach ($customer->getContacts() as $contact)
            {
                $replace[] = array('type' => $contact->type,
                                   'value'=> $contact->value);
            }
            
            // define with sections will be enabled
            $this->html->enableSection('contacts');
            $this->html->enableSection('contacts-detail', $replace, TRUE);
            
            // wrap the page content using vertical box
            $vbox = new TVBox;
            $vbox->style = 'width: 100%';
            $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
            $vbox->add($this->html);
    
            parent::add($vbox);            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
