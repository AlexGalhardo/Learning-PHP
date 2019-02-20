<?php
/**
 * Multi Step 4
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MultiStepRegistration4View extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        try
        {
            TPage::include_css('app/resources/confirmation.css');
            
            // create the HTML Renderer
            $this->html = new THtmlRenderer('app/resources/confirmation.html');
            
            $confirmation_data = array_merge(TSession::getValue('registration_course'),
                                             TSession::getValue('registration_data'));
            $this->html->enableSection('main', $confirmation_data);
            
            $breadcrumb = new TBreadCrumb;
            $breadcrumb->setHomeController('MultiStepRegistration1View');
            $breadcrumb->addHome();
            $breadcrumb->addItem('Welcome');
            $breadcrumb->addItem('Selection');
            $breadcrumb->addItem('Complete information');
            $breadcrumb->addItem('Confirmation');
            $breadcrumb->select('Confirmation');
            
            // wrap the page content using vertical box
            $vbox = new TVBox;
            $vbox->style = 'width: 100%';
            $vbox->add( $breadcrumb );
            $vbox->add($this->html);
            parent::add($vbox);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
