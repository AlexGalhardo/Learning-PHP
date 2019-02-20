<?php
/**
 * CustomerFormView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CustomerFormView extends TPage
{
    private $form; // form
    private $contacts;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_customer');
        $this->form->setFormTitle('Customer');
        
        // create the form fields
        $code        = new TEntry('id');
        $name        = new TEntry('name');
        $address     = new TEntry('address');
        $phone       = new TEntry('phone');
        $city_id     = new TDBUniqueSearch('city_id', 'samples', 'City', 'id', 'name');
        $birthdate   = new TDate('birthdate');
        $email       = new TEntry('email');
        $gender      = new TRadioGroup('gender');
        $status      = new TCombo('status');
        $category_id = new TDBCombo('category_id', 'samples', 'Category', 'id', 'name');
        
        // add the combo options
        $gender->addItems( [ 'M' => 'Male', 'F' => 'Female' ] );
        $status->addItems( [ 'S' => 'Single', 'C' => 'Committed', 'M' => 'Married' ] );
        $gender->setLayout('horizontal');
        
        // define some properties for the form fields
        $code->setEditable(FALSE);
        $code->setSize('30%');
        $city_id->setSize('100%');
        $birthdate->setSize('100%');
        $gender->setUseButton();
        $gender->setSize('100%');
        $status->enableSearch();
        $category_id->enableSearch();
        $city_id->setMinLength(0);
        $city_id->setMask('{name} <b>{state->name}</b>');
        
        $this->form->appendPage('Basic data');
        $this->form->addFields( [ new TLabel('Code') ],      [ $code ] );
        $this->form->addFields( [ new TLabel('Name') ],      [ $name ] );
        $this->form->addFields( [ new TLabel('Address') ],   [ $address ] );
        $this->form->addFields( [ new TLabel('City') ],      [ $city_id ] );
        $this->form->addFields( [ new TLabel('Phone') ],     [ $phone ],
                                [ new TLabel('BirthDate') ], [ $birthdate ] );
        $this->form->addFields( [ new TLabel('Status') ],    [ $status ],
                                [ new TLabel('Email') ],     [ $email ]);
        $this->form->addFields( [ new TLabel('Category') ],  [ $category_id ],
                                [ new TLabel('Gender') ],    [ $gender ] );
        
        $this->form->appendPage('Skills');
        $skill_list = new TDBCheckGroup('skill_list', 'samples', 'Skill', 'id', 'name');
        $this->form->addFields( [ new TLabel('Skill') ],     [ $skill_list ] );
        
        $this->form->appendPage('Contacts');
        $contact_type = new TEntry('contact_type[]');
        $contact_type->setSize('100%');
        
        $contact_value = new TEntry('contact_value[]');
        $contact_value->setSize('100%');
        
        $this->contacts = new TFieldList;
        $this->contacts->addField( '<b>Type</b>', $contact_type, ['width' => '50%']);
        $this->contacts->addField( '<b>Value</b>', $contact_value, ['width' => '50%']);
        $this->form->addField($contact_type);
        $this->form->addField($contact_value);
        $this->contacts->enableSorting();
        
        $this->form->addContent( [ new TLabel('Contacts') ], [ $this->contacts ] );
        
        $this->form->addAction( 'Save', new TAction([$this, 'onSave']), 'fa:save green' );
        $this->form->addAction( 'Clear', new TAction([$this, 'onClear']), 'fa:eraser red' );
        $this->form->addActionLink( 'List', new TAction(['CustomerDataGridView', 'onReload']), 'fa:table blue' );
        
        // wrap the page content
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'CustomerDataGridView'));
        $vbox->add($this->form);
        
        // add the form inside the page
        parent::add($vbox);
    }
    
    /**
     * method onSave
     * Executed whenever the user clicks at the save button
     */
    public static function onSave($param)
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('samples');
            
            if (empty($param['birthdate']))
            {
                throw new Exception(AdiantiCoreTranslator::translate('The field ^1 is required', 'Birthdate'));
            }
            
            // read the form data and instantiates an Active Record
            $customer = new Customer;
            $customer->fromArray( $param );
            
            if( !empty($param['contact_type']) AND is_array($param['contact_type']) )
            {
                foreach( $param['contact_type'] as $row => $contact_type)
                {
                    if ($contact_type)
                    {
                        $contact = new Contact;
                        $contact->type  = $contact_type;
                        $contact->value = $param['contact_value'][$row];
                        
                        // add the contact to the customer
                        $customer->addContact($contact);
                    }
                }
            }
            
            if ( !empty($param['skill_list']) )
            {
                foreach ($param['skill_list'] as $skill_id)
                {
                    // add the skill to the customer
                    $customer->addSkill(new Skill($skill_id));
                }
            }
            
            // stores the object in the database
            $customer->store();
            
            $data = new stdClass;
            $data->id = $customer->id;
            TForm::sendData('form_customer', $data);
            
            // shows the success message
            new TMessage('info', 'Record saved');
            
            TTransaction::close(); // close the transaction
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
    
    /**
     * method onEdit
     * Edit a record data
     */
    function onEdit($param)
    {
        try
        {
            if (isset($param['id']))
            {
                // open a transaction with database 'samples'
                TTransaction::open('samples');
                
                // load the Active Record according to its ID
                $customer = new Customer($param['id']);
                
                // load the contacts (composition)
                $contacts = $customer->getContacts();
                
                if ($contacts)
                {
                    $this->contacts->addHeader();
                    foreach ($contacts as $contact)
                    {
                        $contact_detail = new stdClass;
                        $contact_detail->contact_type  = $contact->type;
                        $contact_detail->contact_value = $contact->value;
                        
                        $this->contacts->addDetail($contact_detail);
                    }
                    
                    $this->contacts->addCloneAction();
                }
                else
                {
                    $this->onClear($param);
                }
                
                // load the skills (aggregation)
                $skills = $customer->getSkills();
                $skill_list = array();
                if ($skills)
                {
                    foreach ($skills as $skill)
                    {
                        $skill_list[] = $skill->id;
                    }
                }
                $customer->skill_list = $skill_list;
                
                // fill the form with the active record data
                $this->form->setData($customer);
                
                // close the transaction
                TTransaction::close();
            }
            else
            {
                $this->onClear($param);
            }
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * Clear form
     */
    public function onClear($param)
    {
        $this->form->clear();
        
        $this->contacts->addHeader();
        $this->contacts->addDetail( new stdClass );
        $this->contacts->addCloneAction();
    }
}
