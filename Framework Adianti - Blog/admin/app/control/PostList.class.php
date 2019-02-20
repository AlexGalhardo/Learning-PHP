<?php
/**
 * PostList Listing
 * @author  <your name here>
 */
class PostList extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        parent::setDatabase('blog'); // defines the database
        parent::setActiveRecord('Post'); // defines the active record
        parent::setFilterField('title'); // defines the filter field
        parent::setDefaultOrder('id', 'desc');
        
        // creates the form
        $this->form = new TForm('form_search_Post');
        $this->form->class = 'tform';
        
        // creates a table
        $table = new TTable;
        $table->width = '100%';
        
        // add the table inside the form
        $this->form->add($table);
        
        $table->addRowSet(new TLabel(_t('Posts')), '')->class='tformtitle';
        
        // create the form fields
        $filter = new TEntry('title');
        $filter->setValue(TSession::getValue('Post_title'));
        
        // add a row for the filter field
        $row=$table->addRow();
        $row->addCell(new TLabel('title:'));
        $row->addCell($filter);
        
        // create two action buttons to the form
        $find_button = new TButton('find');
        $new_button  = new TButton('new');
        // define the button actions
        $find_button->setAction(new TAction(array($this, 'onSearch')), _t('Find'));
        $find_button->setImage('fa:search');
        
        $new_button->setAction(new TAction(array('PostForm', 'onEdit')), _t('New'));
        $new_button->setImage('fa:plus-circle green');
        
        $buttons = new THBox;
        $buttons->add($find_button);
        $buttons->add($new_button);
        $row=$table->addRow();
        $row->class = 'tformaction';
        $cell = $row->addCell( $buttons );
        $cell->colspan = 2;
        
        // define wich are the form fields
        $this->form->setFields(array($filter, $find_button, $new_button));
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->style = "width: 100%";
        
        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'id', 'center', '10%');
        $title = $this->datagrid->addQuickColumn(_t('Title'), 'title', 'left', '60%');
        $category_name = $this->datagrid->addQuickColumn(_t('Category'), 'category_name', 'center', '30%');
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), new TDataGridAction(array('PostForm', 'onEdit')), 'id', 'fa:edit blue');
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

        // add the container inside the page
        parent::add($vbox);
    }
}
