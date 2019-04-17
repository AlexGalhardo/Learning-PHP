<?php
/**
 * FormClientInteractionsView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormClientInteractionsView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // create the form
        $this->form = new BootstrapFormBuilder('form_bmi');
        $this->form->setFormTitle(_t('Client interactions'));
        
        // create the form fields
        $mass   = new TEntry('mass');
        $height = new TEntry('height');
        $result = new TEntry('result');
        
        $result->setEditable(FALSE);
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Mass (Kg)')],  [$mass] );
        $this->form->addFields( [new TLabel('Height (m)')], [$height] );
        $this->form->addFields( [new TLabel('Result')],     [$result] );
        
        $mass->onBlur   = 'calculate_bmi()';
        $height->onBlur = 'calculate_bmi()';
        
        TScript::create('calculate_bmi = function() {
            if (document.form_bmi.mass.value > 0 && document.form_bmi.height.value > 0)
            {
                form_bmi.result.value = parseFloat(form_bmi.mass.value) /
                               Math.pow(parseFloat(form_bmi.height.value),2);
            }
        };');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
}
