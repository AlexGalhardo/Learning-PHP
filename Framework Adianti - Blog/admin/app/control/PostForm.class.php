<?php
/**
 * PostForm Registration
 * @author  <your name here>
 */
class PostForm extends TStandardForm
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
        $this->form = new TQuickForm('form_Post');
        $this->form->class = 'tform';
        $this->form->style = 'width: 100%';
        $this->form->setFormTitle( _t('Post') );
        
        // defines the database
        parent::setDatabase('blog');
        
        // defines the active record
        parent::setActiveRecord('Post');

        // create the form fields
        $id           = new TEntry('id');
        $title        = new TEntry('title');
        $body         = new THtmlEditor('body');
        $keywords     = new TEntry('keywords');
        $date         = new TDate('date');
        $category_id  = new TDBCombo('category_id', 'blog', 'Category', 'id', 'name');

        $id->setEditable(FALSE);
        
        // add the fields
        $this->form->addQuickField('ID',           $id,  '30%');
        $this->form->addQuickField(_t('Title'),    $title, '70%');
        $this->form->addQuickField(_t('Keywords'), $keywords, '70%');
        $this->form->addQuickField(_t('Category'), $category_id, '70%');
        $this->form->addQuickField(_t('Date'),     $date,  84);
        
        $row = $this->form->getContainer()->addRow();
        $row->addCell( $lbl=new TLabel(_t('Post') . ':') );
        $lbl->setFontStyle('b');
        $lbl->setFontSize(14);
        
        $body->style = 'margin: 10px';
        $row = $this->form->getContainer()->addRow();
        $row->addCell( $body )->colspan=2;
        $this->form->addField( $body );
        $body->setSize('100%', 300);

        // define the form action
        $this->form->addQuickAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:save green');
        
        // add the form to the page
        parent::add($this->form);
    }
}
