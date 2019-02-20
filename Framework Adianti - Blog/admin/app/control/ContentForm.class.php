<?php
/**
 * ContentForm Registration
 * @author  <your name here>
 */
class ContentForm extends TStandardForm
{
    protected $form; // form
    protected $notebook;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new TQuickForm('form_Content');
        $this->form->class = 'tform';
        $this->form->style = 'width: 100%';
        $this->form->setFormTitle(_t('Content'));
        
        // defines the database
        parent::setDatabase('blog');
        
        // defines the active record
        parent::setActiveRecord('Content');
        
        // create the form fields
        $id         = new TEntry('id');
        $title      = new TEntry('title');
        $subtitle   = new TText('subtitle');
        $sidepanel  = new THtmlEditor('sidepanel');
        $id->setEditable(FALSE);

        // add the fields
        $this->form->addQuickField('ID', $id,  '30%');
        $this->form->addQuickField(_t('Title'), $title,  '70%');
        $this->form->addQuickField(_t('Subtitle'), $subtitle,  '70%');
        $row = $this->form->getContainer()->addRow();
        $row->addCell( $lbl=new TLabel(_t('Side panel')) );
        $lbl->setFontStyle('b');
        
        $sidepanel->style = 'margin: 10px';
        $row = $this->form->getContainer()->addRow();
        $row->addCell( $sidepanel )->colspan=2;
        $this->form->addField( $sidepanel );

        $subtitle->setSize('70%', 40);
        $sidepanel->setSize('100%', 200);


        // define the form action
        $this->form->addQuickAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:save');

        TTransaction::open('blog');
        $content = new Content;
        if ($content->load(1))
        {
            $this->onEdit(array('key'=>1));
        }
        TTransaction::close();
        // add the form to the page
        parent::add($this->form);
    }
    
    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    function onSave()
    {
        try
        {
            // open a transaction with database
            TTransaction::open($this->database);
            
            // get the form data
            $object = $this->form->getData($this->activeRecord);
            
            // validate data
            $this->form->validate();
            
            // stores the object
            $object->store();
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            // close the transaction
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
            // reload the listing
        }
        catch (Exception $e) // in case of exception
        {
            // get the form data
            $object = $this->form->getData($this->activeRecord);
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
}
