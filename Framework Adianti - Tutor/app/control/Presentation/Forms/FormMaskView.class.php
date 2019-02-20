<?php
/**
 * FormMaskView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormMaskView extends TPage
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
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Input masks'));
        
        // create the form fields
        $element1 = new TEntry('element1');
        $element2 = new TEntry('element2');
        $element3 = new TEntry('element3');
        $element4 = new TEntry('element4');
        $element5 = new TEntry('element5');
        $element6 = new TEntry('element6');
        $element7 = new TEntry('element7');
        $element8 = new TEntry('element8');
        $element9 = new TEntry('element9');
        $element10= new TEntry('element10');
        $element11= new TEntry('element11');
        $element12= new TEntry('element12');
        $element13= new TEntry('element13');
        $element14= new TEntry('element14');
        
        $element1->setMask('99.999-999');
        $element2->setMask('99.999-999', true);
        $element3->setMask('99.999.999/9999-99');
        $element4->setMask('99.999.999/9999-99', true);
        $element5->setMask('A!');
        $element6->setMask('AAA');
        $element7->setMask('S!');
        $element8->setMask('SSS');
        $element9->setMask('9!');
        $element10->setMask('999');
        $element11->setMask('SSS-9999');
        $element12->forceUpperCase();
        $element13->forceLowerCase();
        $element14->setNumericMask(2, ',', '.', true);
        
        $element1->setValue('95.900-716');
        $element2->setValue('95900716');
        $element3->setValue('05.343.117/0001-44');
        $element4->setValue('05343117000144');
        
        // adjust grid layout columns
        $this->form->setColumnClasses(2, ['col-sm-4', 'col-sm-8']);
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Element 1 (99.999-999)')], [$element1] );
        $this->form->addFields( [new TLabel('Element 2 (99.999-999) - clear post')], [$element2] );
        $this->form->addFields( [new TLabel('Element 3 (99.999.999/9999-99)')], [$element3] );
        $this->form->addFields( [new TLabel('Element 4 (99.999.999/9999-99) - clear post')], [$element4] );
        $this->form->addFields( [new TLabel('Element 5 (A!) non-delimited alphanumeric')], [$element5] );
        $this->form->addFields( [new TLabel('Element 6 (AAA) delimited alphanumeric')], [$element6] );
        $this->form->addFields( [new TLabel('Element 7 (S!) non-delimited alpha')], [$element7] );
        $this->form->addFields( [new TLabel('Element 8 (SSS) delimited alpha')], [$element8] );
        $this->form->addFields( [new TLabel('Element 9 (9!) non-delimited numbers')], [$element9] );
        $this->form->addFields( [new TLabel('Element 10 (999) delimited numbers')], [$element10] );
        $this->form->addFields( [new TLabel('Element 11 (SSS-999) alpha and numeric')], [$element11] );
        $this->form->addFields( [new TLabel('Element 12 force uppercase')], [$element12] );
        $this->form->addFields( [new TLabel('Element 13 force lowercase')], [$element13] );
        $this->form->addFields( [new TLabel('Element 14 numeric mask')], [$element14] );
        
        $this->form->addAction( 'Send', new TAction([$this, 'onSend']), 'fa:check-circle-o green');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Send data
     */
    public function onSend($param)
    {
        $data = $this->form->getData();
        $this->form->setData($data);
        
        new TMessage('info', str_replace(',', '<br>', json_encode($data)));
    }
}
