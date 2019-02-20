<?php
/**
 * CategoryFormList Registration
 * @author  <your name here>
 */
class CategoryFormList extends TStandardFormList
{
    protected $form; // form
    protected $datagrid; // datagrid
    protected $pageNavigation;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // defines the database
        parent::setDatabase('blog');
        
        // defines the active record
        parent::setActiveRecord('Category');
        
        // creates the form
        $this->form = new TQuickForm('form_Category');
        $this->form->setFormTitle(_t('Categories'));
        $this->form->class = 'tform';


        // create the form fields
        $id    = new TEntry('id');
        $name  = new TEntry('name');


        // add the fields
        $this->form->addQuickField('ID', $id,  '30%');
        $this->form->addQuickField(_t('Name'), $name , '70%');
        $id->setEditable(FALSE);

        // define the form action
        $this->form->addQuickAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:save');
        $this->form->addQuickAction(_t('Clear'), new TAction(array($this, 'onEdit')), 'fa:eraser red');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->style = "width: 100%";
        
        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'id', 'center', '10%');
        $name = $this->datagrid->addQuickColumn(_t('Name'), 'name', 'left', '90%');
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), new TDataGridAction(array($this, 'onEdit')), 'id', 'fa:edit blue');
        $this->datagrid->addQuickAction(_t('Delete'), new TDataGridAction(array($this, 'onDelete')), 'id', 'fa:trash red');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // creates the page container
        $vbox = new TVBox;
        $vbox->style = "width: 100%";
        $vbox->add($this->form);
        $vbox->add($this->datagrid);
        $vbox->add($this->pageNavigation);
        
        // add the table inside the page
        parent::add($vbox);
    }
}
