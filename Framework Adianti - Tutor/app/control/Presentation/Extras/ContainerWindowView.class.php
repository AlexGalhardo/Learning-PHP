<?php
/**
 * ContainerWindowView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerWindowView extends TWindow
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        parent::setTitle(_t('Window events'));
        
        // with: 500, height: automatic
        parent::setSize(500, null); // use 0.6, 0.4 (for relative sizes 60%, 40%)
        
        $close_action = new TAction([$this, 'onBeforeClose']);
        $close_action->setParameter('id', parent::getId());
        parent::setCloseAction($close_action);
        
        // create the form
        $this->form = new BootstrapFormBuilder('window_form');
        $this->form->setProperty('style', 'margin-bottom:0');
        
        // create the form fields
        $id          = new TEntry('id');
        $description = new TEntry('description');
        $date        = new TDate('date');
        $text        = new TText('text');
        
        // add the fields inside the form
        $this->form->addFields(['Text'], [$text] );
        
        $text->setSize(300,100);
        
        // define the form action 
        $this->form->addAction('Save', new TAction(array($this, 'onSave')), 'fa:check-circle-o green');
        
        // add the form inside the page
        parent::add($this->form);
    }
    
    /**
     * on close event
     */
    public static function onBeforeClose($param)
    {
        $action = new TAction(['ContainerWindowView', 'onClose']);
        $action->setParameter('id', $param['id']);
        new TQuestion('Want to close?', $action);
    }
    
    public static function onClose($param)
    {
        parent::closeWindow($param['id']);
        AdiantiCoreApplication::loadPage('SinglePageView');
    }
    
    /**
     * Simulates an save button
     * Show the form content
     */
    public function onSave($param)
    {
        $data = $this->form->getData(); // optional parameter: active record class
        
        // put the data back to the form
        $this->form->setData($data);
        
        new TMessage('info', $data->text);
    }
}
