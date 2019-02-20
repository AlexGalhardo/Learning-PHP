<?php
/**
 * FormConditionalView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormConditionalView extends TPage
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
        $this->form = new BootstrapFormBuilder('cond_form');
        $this->form->setFormTitle(_t('Conditional submission'));
        
        // create the form fields
        $animal = new TEntry('animal');
        $color  = new TEntry('color');
        
        $animal->setExitAction(new TAction(array($this, 'onEnableAction')));
        $color->setExitAction(new TAction(array($this, 'onEnableAction')));
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Animal (type "elephant"): ')], [$animal] );
        $this->form->addFields( [new TLabel('Color (type "blue")')],  [$color] );
        
        // define the form action 
        $this->form->addAction('Save', new TAction(array($this, 'onSave')), 'fa:save green');
        
        self::onEnableAction(array());
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        
        parent::add($vbox);
    }
    
    /**
     * Executed when user leaves the fields
     */
    public static function onEnableAction($data)
    {
        if ( isset($data['animal']) AND isset($data['color']))
        {
            if ( ($data['animal'] == 'elephant') AND ($data['color'] == 'blue') )
            {
                TButton::enableField('cond_form', 'save');
            }
            else
            {
                TButton::disableField('cond_form', 'save');
            }
        }
        else
        {
            TButton::disableField('cond_form', 'save');
        }
    }
    
    /**
     * Simulates an save button
     * Show the form content
     */
    public function onSave($param)
    {
        $data = $this->form->getData();
        $this->form->setData($data);
        
        $message = '';
        $message.= 'Animal : ' . $data->animal . '<br>';
        $message.= 'Color : '  . $data->color . '<br>';
        new TMessage('info', $message);
        
        self::onEnableAction((array) $data);
    }
}
?>