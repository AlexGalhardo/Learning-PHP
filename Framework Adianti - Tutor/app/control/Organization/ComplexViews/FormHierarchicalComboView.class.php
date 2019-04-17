<?php
/**
 * FormHierarchicalComboView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormHierarchicalComboView extends TPage
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
        $this->form = new BootstrapFormBuilder('form_hierarchical');
        $this->form->setFormTitle(_t('Hierarchical combo'));
        
        $id = new TEntry('id');
        $name = new TEntry('name');
        $state_id = new TDBCombo('state_id', 'samples', 'State', 'id', 'name', 'name');
        $state_id->enableSearch();
        
        // filter to avoid preload items
        $filter = new TCriteria;
        $filter->add(new TFilter('id', '<', '0'));
        $city_id = new TDBCombo('city_id', 'samples', 'City', 'id', 'name', 'name', $filter);
        $customer_id = new TDBCombo('customer_id', 'samples', 'Customer', 'id', 'name', 'name', $filter);
        
        $city_id->enableSearch();
        $customer_id->enableSearch();
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Id')],    [$id] );
        $this->form->addFields( [new TLabel('Name')],  [$name] );
        $this->form->addFields( [new TLabel('State')], [$state_id] );
        $this->form->addFields( [new TLabel('City')],  [$city_id] );
        $this->form->addFields( [new TLabel('Customer')],  [$customer_id] );
        $id->setEditable(FALSE);
        $id->setSize('30%');
        
        $state_id->setChangeAction( new TAction( array($this, 'onStateChange' )) );
        $city_id->setChangeAction( new TAction( array($this, 'onCityChange' )) );
        
        $this->form->addAction('Save', new TAction(array($this, 'onSave')));
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style='width:100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Save form data
     * @param $param Request
     */
    public function onSave( $param )
    {
        try
        {
            TTransaction::open('samples'); // open a transaction
            $this->form->validate(); // validate form data
            
            $object = new Test;  // create an empty object
            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;
            
            $this->form->setData($data); // fill form data
            
            $this->fireEvents( $object );
            
            TTransaction::close(); // close the transaction
            
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Fire form events
     * @param $param Request
     */
    public function fireEvents( $object )
    {
        $obj = new stdClass;
        $obj->state_id    = $object->state_id;
        $obj->city_id     = $object->city_id;
        $obj->customer_id = $object->customer_id;
        TForm::sendData('form_hierarchical', $obj);
    }
    
    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('samples'); // open a transaction
                $object = new Test($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
                
                $this->fireEvents( $object );
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Action to be executed when the user changes the state
     * @param $param Action parameters
     */
    public static function onStateChange($param)
    {
        try
        {
            TTransaction::open('samples');
            if (!empty($param['state_id']))
            {
                $criteria = TCriteria::create( ['state_id' => $param['state_id'] ] );
                
                // formname, field, database, model, key, value, ordercolumn = NULL, criteria = NULL, startEmpty = FALSE
                TDBCombo::reloadFromModel('form_hierarchical', 'city_id', 'samples', 'City', 'id', '{name} ({id})', 'name', $criteria, TRUE);
            }
            else
            {
                TCombo::clearField('form_hierarchical', 'city_id');
            }
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Action to be executed when the user changes the city
     * @param $param Action parameters
     */
    public static function onCityChange($param)
    {
        try
        {
            TTransaction::open('samples');
            if (!empty($param['city_id']))
            {
                $criteria = TCriteria::create( ['city_id' => $param['city_id'] ] );
                
                // formname, field, database, model, key, value, ordercolumn = NULL, criteria = NULL, startEmpty = FALSE
                TDBCombo::reloadFromModel('form_hierarchical', 'customer_id', 'samples', 'Customer', 'id', '{name} ({id})', 'name', $criteria, TRUE);
            }
            else
            {
                TCombo::clearField('form_hierarchical', 'customer_id');
            }
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
