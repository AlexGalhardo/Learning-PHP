<?php
/**
 * MemberForm Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MemberForm extends TStandardForm
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
        parent::setActiveRecord('Member');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Member');
        $this->form->setFormTitle(_t('Members'));
        
        // create the form fields
        $id          = new TEntry('id');
        $name        = new TEntry('name');
        $birthdate   = new TDate('birthdate');
        $address     = new TEntry('address');
        $city_id     = new TDBSeekButton('city_id', 'library', 'form_Member', 'City', 'name', 'city_id', 'city_name');
        $city_name   = new TEntry('city_name');
        $phone_number= new TEntry('phone_number');
        $email       = new TEntry('email');
        $login       = new TEntry('login');
        $password    = new TPassword('password');
        $category_id = new TDBCombo('category_id', 'library', 'Category', 'id', 'description');
        $registration= new TDate('registration');
        $expiration  = new TDate('expiration'); 
        $id->setEditable(FALSE);
        
        // add form fields
        $this->form->addFields( [new TLabel(_t('Code'))], [$id] );
        $this->form->addFields( [new TLabel(_t('Name'))], [$name] );
        $this->form->addFields( [new TLabel(_t('Address'))], [$address] );
        $this->form->addFields( [new TLabel(_t('City'))], [$city_id ] );
        $this->form->addFields( [new TLabel(_t('Category'))], [$category_id], [new TLabel(_t('Birthdate'))], [$birthdate] );
        $this->form->addFields( [new TLabel(_t('Phone'))], [$phone_number], [new TLabel(_t('Email'))], [$email] );
        $this->form->addFields( [new TLabel(_t('Login'))], [$login], [new TLabel(_t('Password'))], [$password] );
        $this->form->addFields( [new TLabel(_t('Registration'))], [$registration], [new TLabel(_t('Expiration'))], [$expiration] );
        
        $id->setSize('30%');
        $name->setSize('100%');
        $address->setSize('100%');
        $category_id->setSize('100%');
        $birthdate->setSize('100%');
        $phone_number->setSize('100%');
        $email->setSize('100%');
        $login->setSize('100%');
        $password->setSize('100%');
        $registration->setSize('100%');
        $expiration->setSize('100%');
        $city_id->setSize('calc(20% - 22px)');
        $city_name->setSize('80%');
        $city_id->setAuxiliar($city_name);
        $city_name->setEditable(FALSE);
        
        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'), new TAction(array($this, 'onClear')), 'fa:eraser red');
        $this->form->addActionLink(_t('Back to the listing'), new TAction(array('MemberList', 'onReload')), 'fa:table blue');
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'MemberList'));
        $container->add($this->form);
        
        // add the form to the page
        parent::add($container);
    }
}
