<?php
/**
 * ContactForm Registration
 * @author  <your name here>
 */
class ContactForm extends TPage
{
    protected $form; // form
    
    use Adianti\Base\AdiantiStandardFormTrait; // Standard form methods
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('contacts');              // defines the database
        $this->setActiveRecord('Contact');     // defines the active record
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Contact');
        $this->form->setFormTitle('Contact');
        

        // create the form fields
        $id = new TEntry('id');
        $name = new TEntry('name');
        $email = new TEntry('email');
        $number = new TEntry('number');
        $address = new TText('address');
        $notes = new TText('notes');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Name') ], [ $name ] );
        $this->form->addFields( [ new TLabel('Email') ], [ $email ] );
        $this->form->addFields( [ new TLabel('Number') ], [ $number ] );
        $this->form->addFields( [ new TLabel('Address') ], [ $address ] );
        $this->form->addFields( [ new TLabel('Notes') ], [ $notes ] );



        // set sizes
        $id->setSize('100%');
        $name->setSize('100%');
        $email->setSize('100%');
        $number->setSize('100%');
        $address->setSize('100%');
        $notes->setSize('100%');


        
        if (!empty($id))
        {
            $id->setEditable(FALSE);
        }
        
        /** samples
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( '100%' ); // set size
         **/
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'),  new TAction(array($this, 'onEdit')), 'fa:eraser red');
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 90%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        
        parent::add($container);
    }
}
