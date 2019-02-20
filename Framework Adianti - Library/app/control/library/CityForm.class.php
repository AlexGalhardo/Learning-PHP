<?php
/**
 * CityForm Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CityForm extends TStandardForm
{
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // defines the database
        parent::setDatabase('library');
        
        // defines the active record
        parent::setActiveRecord('City');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_City');
        $this->form->setFormTitle(_t('Cities'));
        
        // create the form fields
        $id      = new TEntry('id');
        $name    = new TEntry('name');

        $id->setEditable(FALSE);
        
        // add form fields
        $this->form->addFields( [new TLabel(_t('Code'))], [$id] );
        $this->form->addFields( [new TLabel(_t('Name'))], [$name] );
        $id->setSize('50%');
        $name->setSize('100%');
        
        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'), new TAction(array($this, 'onClear')), 'fa:eraser red');
        $this->form->addAction(_t('Back to the listing'), new TAction(array('CityList', 'onReload')), 'fa:table blue');
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'CityList'));
        $container->add($this->form);
        
        // add the form to the page
        parent::add($container);
    }
}
