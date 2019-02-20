<?php
/**
 * StandardFormView Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class StandardFormView extends TPage
{
    protected $form; // form
    
    // trait with onSave, onClear, onEdit
    use Adianti\Base\AdiantiStandardFormTrait;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('samples');    // defines the database
        $this->setActiveRecord('City');   // defines the active record
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_City');
        $this->form->setFormTitle(_t('Standard Form'));
        
        // create the form fields
        $id       = new TEntry('id');
        $name     = new TEntry('name');
        $state_id = new TDBCombo('state_id', 'samples', 'State', 'id', 'name');
        $id->setEditable(FALSE);
        
        // add the form fields
        $this->form->addFields( [new TLabel('ID')], [$id] );
        $this->form->addFields( [new TLabel('Name', 'red')], [$name] );
        $this->form->addFields( [new TLabel('State', 'red')], [$state_id] );
        
        $name->addValidation( 'Name', new TRequiredValidator);
        $state_id->addValidation( 'State', new TRequiredValidator);
        
        // define the form action
        $this->form->addAction('Save', new TAction(array($this, 'onSave')), 'fa:save green');
        $this->form->addAction('Clear',  new TAction(array($this, 'onClear')), 'fa:eraser red');
        $this->form->addActionLink('Listing',  new TAction(array('StandardDataGridView', 'onReload')), 'fa:table blue');

        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
}
