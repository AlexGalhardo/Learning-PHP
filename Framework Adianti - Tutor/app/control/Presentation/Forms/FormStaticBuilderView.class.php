<?php
/**
 * FormStaticBuilderView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormStaticBuilderView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Form with static post'));
        
        $id      = new TEntry('id');
        $name    = new TEntry('name');
        $address = new TEntry('address');
        $date    = new TDate('date');
        $obs     = new TText('obs');
        
        // add a row with 2 slots
        $this->form->addFields( [ new TLabel('Id') ],        [ $id ] );
        $this->form->addFields( [ $lbl=new TLabel('Name') ], [ $name ] );
        $this->form->addFields( [ new TLabel('Address') ],   [ $address ] );
        $this->form->addFields( [ new TLabel('Date') ],      [ $date ] );
        $this->form->addFields( [ new TLabel('Obs') ],       [ $obs ] );
        
        $lbl->setFontColor('red');
        $id->setSize('30%');
        $name->setSize('70%');
        $address->setSize('70%');
        $obs->setSize('70%');
        
        $this->form->addAction('Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Static post data
     */
    public static function onSend($param)
    {
        try
        {
            if (empty($param['name']))
            {
                throw new Exception('Name cannot be empty');
            }
            
            // show results
            new TMessage('info', str_replace("\n", '<br> ', print_r($param, true)));
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
