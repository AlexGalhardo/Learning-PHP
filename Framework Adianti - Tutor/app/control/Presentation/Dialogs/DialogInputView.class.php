<?php
/**
 * DialogInputView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DialogInputView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $qform = new TQuickForm;
        $qform->class='tform';
        $qform->addQuickAction('Open Input dialog', new TAction(array($this, 'onInputDialog')), 'ico_open.png');
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($qform);
        
        parent::add( $vbox );
    }
    
    /**
     * Open an input dialog
     */
    public function onInputDialog( $param )
    {
        $form = new TQuickForm('input_form');
        $form->style = 'padding:20px';
        
        $login = new TEntry('login');
        $pass  = new TPassword('password');
        
        $form->addQuickField('Login', $login);
        $form->addQuickField('Password', $pass);
        
        $form->addQuickAction('Confirm 1', new TAction(array($this, 'onConfirm1')), 'fa:save green');
        $form->addQuickAction('Confirm 2', new TAction(array($this, 'onConfirm2')), 'fa:check-circle-o blue');
        
        // show the input dialog
        new TInputDialog('Input dialog title', $form);
    }
    
    /**
     * Show the input dialog data
     */
    public function onConfirm1( $param )
    {
        new TMessage('info', 'Confirm1 : ' . json_encode($param));
    }
    
    /**
     * Show the input dialog data
     */
    public function onConfirm2( $param )
    {
        new TMessage('info', 'Confirm2 : ' . json_encode($param));
    }
}
