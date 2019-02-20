<?php
/**
 * Multi Step 1
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MultiStepRegistration1View extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        try
        {
            // create the HTML Renderer
            $this->html = new THtmlRenderer('app/resources/welcome.html');
            $this->html->enableSection('main');
            
            $breadcrumb = new TBreadCrumb;
            $breadcrumb->setHomeController('MultiStepRegistration1View');
            $breadcrumb->addHome();
            $breadcrumb->addItem('Welcome');
            $breadcrumb->addItem('Selection');
            $breadcrumb->addItem('Complete information');
            $breadcrumb->addItem('Confirmation');
            $breadcrumb->select('Welcome');
            
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
    
    function loadPage()
    {}
}
