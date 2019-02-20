<?php
/**
 * FormSeekButtonView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormSeekButtonView extends TPage
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
        $this->form = new BootstrapFormBuilder('form_seek');
        $this->form->setFormTitle(_t('Seek button'));
        
        $city_id   = new TDBSeekButton('city_id', 'samples', 'form_seek', 'City', 'name');
        $city_name = new TEntry('city_name');
        $city_id->setAuxiliar($city_name);
        
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id', '>=', 1));
        $criteria->add(new TFilter('id', '<=', 10));
        $criteria->setProperty('order', 'id');
        
        $product_id   = new TDBSeekButton('product_id', 'samples', 'form_seek', 'Product', 'description');
        $product_name = new TEntry('product_name');
        $product_id->setCriteria($criteria);
        $product_id->setAuxiliar($product_name);
        
        $customer_id   = new TDBSeekButton('customer_id', 'samples', 'form_seek', 'Customer', 'name');
        $customer_name = new TEntry('customer_name');
        $customer_id->setDisplayMask('{name} - {city->name} - {city->state->name}');
        $customer_id->setDisplayLabel('Informações do cliente');
        $customer_id->setAuxiliar($customer_name);
        
        $city_name->setEditable(FALSE);
        $product_name->setEditable(FALSE);
        $customer_name->setEditable(FALSE);
        
        // adjust grid layout columns
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
        // add form fields
        $this->form->addFields( [new TLabel('Standard Seek')],  [$city_id]);
        $this->form->addFields( [new TLabel('Standard with filter')], [$product_id]);
        $this->form->addFields( [new TLabel('Standard with mask')],   [$customer_id]);
        
        $city_id->setSize(80);
        $product_id->setSize(80);
        $customer_id->setSize(80);
        $city_name->setSize('calc(100% - 120px)');
        $product_name->setSize('calc(100% - 120px)');
        $customer_name->setSize('calc(100% - 120px)');
        $city_name->style .= ';margin-left:3px';
        $product_name->style .= ';margin-left:3px';
        $customer_name->style .= ';margin-left:3px';
        
        $this->form->addAction('Save', new TAction(array($this, 'onSave')), 'fa:save');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
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
        
        // creates a string with the form element's values
        $message = 'City id : '     . $data->city_id . '<br>';
        $message.= 'Product id : '  . $data->product_id . '<br>';
        $message.= 'Customer id : ' . $data->customer_id . '<br>';
        
        // show the message
        new TMessage('info', $message);
    }
}
