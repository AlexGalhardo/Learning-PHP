<?php
/**
 * IssueList Listing
 * @author  <your name here>
 */
class IssueList extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $loaded;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        parent::setActiveRecord('Issue');
        parent::setDatabase('changeman');
        parent::setDefaultOrder('id', 'desc');
        parent::addFilterField('id_status', '=', 'id_status');
        parent::addFilterField('id_project', '=', 'id_project');
        parent::addFilterField('id_priority', '=', 'id_priority');
        parent::addFilterField('id_category', '=', 'id_category');
        parent::addFilterField('title', 'like', 'title');
        
        TTransaction::open('permission');
        $user = SystemUser::newFromLogin(TSession::getValue('login'));
        $is_admin    = $user->checkInGroup( new SystemGroup(1) );
        $is_manager  = $user->checkInGroup( new SystemGroup(3) );
        $is_member   = $user->checkInGroup( new SystemGroup(4) );
        $is_customer = $user->checkInGroup( new SystemGroup(5) );
        TTransaction::close();
        
        if ( $is_admin OR $is_manager OR $is_member )
        {
            parent::addFilterField('id_user', '=', 'id_user');
        }
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Issue');
        $this->form->setFormTitle( _t('Issues') );
        
        $criteria = new TCriteria;
        $criteria->add(new TFilter('active', '=', 'Y'), TExpression::OR_OPERATOR);
        $criteria->add(new TFilter('active', 'IS', NULL), TExpression::OR_OPERATOR);
        
        // create the form fields
        $filter_status    = new TDBCombo('id_status', 'changeman', 'Status', 'id', 'description_translated');
        $filter_project   = new TDBCombo('id_project', 'changeman', 'Project', 'id', 'description');
        $filter_priority  = new TDBCombo('id_priority', 'changeman', 'Priority', 'id', 'description_translated');
        $filter_category  = new TDBCombo('id_category', 'changeman', 'Category', 'id', 'description_translated');
        $filter_user      = new TDBCombo('id_user', 'permission', 'SystemUser', 'id', 'name', 'name', $criteria);
        $filter_title     = new TEntry('title');
        $filter_user->enableSearch();
        $filter_title->setSize('100%');
        $filter_status->setSize('100%');
        $filter_project->setSize('100%');
        $filter_priority->setSize('100%');
        $filter_category->setSize('100%');
        $filter_user->setSize('100%');
        
        $this->form->addFields( [new TLabel(_t('Status'))], [$filter_status], [new TLabel(_t('Project'))], [$filter_project] );
        $this->form->addFields( [new TLabel(_t('Priority'))], [$filter_priority], [new TLabel(_t('Category'))], [$filter_category] );
        
        if ( $is_admin OR $is_manager OR $is_member )
        {
            $this->form->addFields( [new TLabel(_t('Title'))], [$filter_title], [new TLabel(_t('User'))], [$filter_user]);
        }
        else
        {
            $this->form->addFields( [new TLabel(_t('Title'))], [$filter_title]);
        }
        
        $btn = $this->form->addAction( _t('Find'), new TAction(array($this, 'onSearch')), 'fa:search' );
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink( _t('New'), new TAction(array('NewIssueForm', 'onEdit')), 'fa:plus-square green' );
        
        $this->form->setData( TSession::getValue('Issue_filter_data') );
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->datatable = 'true';
        $this->datagrid->width = '100%';
        $this->datagrid->enablePopover(_t('Abstract'), '<table width="500px"><tr><td style="vertical-align:top"><b>'._t('Description').'</b><br>' . '{description}' . '</td><td style="vertical-align:top"><b>'._t('Solution').'</b><br>' . '{solution} </td></tr></table>');
        $this->datagrid->setHeight(320);
        
        // creates the datagrid columns
        $id            = new TDataGridColumn('id', 'ID', 'right', 40);
        $title         = new TDataGridColumn('title', _t('Title'), 'left', NULL);
        $id_status     = new TDataGridColumn('status_name', _t('Status'), 'left', NULL);
        $id_priority   = new TDataGridColumn('priority_name', _t('Priority'), 'left', NULL);
        $id_category   = new TDataGridColumn('category_name', _t('Category'), 'left', NULL);
        $register_date = new TDataGridColumn('register_date', _t('Start date'), 'left', NULL);
        $id_user       = new TDataGridColumn('user_name', _t('User'), 'left', NULL);
        $id_status->setTransformer( array($this, 'setStatusColor') );
        
        // creates the datagrid actions
        $order1= new TAction(array($this, 'onReload'));
        $order2= new TAction(array($this, 'onReload'));
        $order3= new TAction(array($this, 'onReload'));
        $order4= new TAction(array($this, 'onReload'));
        $order5= new TAction(array($this, 'onReload'));
        $order6= new TAction(array($this, 'onReload'));
        $order7= new TAction(array($this, 'onReload'));
        $order8= new TAction(array($this, 'onReload'));
        
        // define the ordering parameters
        $order1->setParameter('order', 'id');
        $order2->setParameter('order', 'title');
        $order3->setParameter('order', 'id_status');
        $order4->setParameter('order', 'id_priority');
        $order5->setParameter('order', 'id_category');
        $order6->setParameter('order', 'register_date');
        
        // assign the ordering actions
        $id->setAction($order1);
        $title->setAction($order2);
        $id_status->setAction($order3);
        $id_priority->setAction($order4);
        $id_category->setAction($order5);
        $register_date->setAction($order6);
        
        // add the columns to the DataGrid
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($title);
        $this->datagrid->addColumn($id_status);
        $this->datagrid->addColumn($id_priority);
        $this->datagrid->addColumn($id_category);
        $this->datagrid->addColumn($register_date);
        
        if ($is_customer)
        {
            parent::setCriteria( TCriteria::create( ['id_user' => $user->id] ) );
        }
        
        if ( $is_admin OR $is_manager )
        {
            // creates two datagrid actions
            $class = 'UpdateIssueForm';
            $action1 = new TDataGridAction(array($class, 'onEdit'));
            $action1->setLabel(_t('Edit'));
            $action1->setImage('fa:pencil-square-o blue fa-lg');
            $action1->setField('id');
            
            $action2 = new TDataGridAction(array($this, 'onDelete'));
            $action2->setLabel(_t('Delete'));
            $action2->setImage('fa:trash-o red fa-lg');
            $action2->setField('id');
            
            $this->datagrid->addColumn($id_user);
            
            // add the actions to the datagrid
            $this->datagrid->addAction($action1);
            $this->datagrid->addAction($action2);
        }
        else if ($is_member)
        {
            // creates two datagrid actions
            $class = 'UpdateIssueForm';
            $action1 = new TDataGridAction(array($class, 'onEdit'));
            $action1->setLabel(_t('Edit'));
            $action1->setImage('fa:pencil-square-o blue fa-lg');
            $action1->setField('id');
            
            $this->datagrid->addColumn($id_user);
            
            // add the actions to the datagrid
            $this->datagrid->addAction($action1);
        }
        
        // creates two datagrid actions
        $class = 'ViewIssueForm';
        $action3 = new TDataGridAction(array($class, 'onView'));
        $action3->setLabel(_t('View'));
        $action3->setImage('fa:search');
        $action3->setField('id');
        
        $class = 'NoteForm';
        $action4 = new TDataGridAction(array($class, 'onEdit'));
        $action4->setLabel(_t('Comment'));
        $action4->setImage('fa:plus-square green');
        $action4->setField('id');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action3);
        $this->datagrid->addAction($action4);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->enableCounters();
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        
        // creates the page structure using a vbox
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        // add the vbox inside the page
        parent::add($container);
    }
    
    /**
     * Set status color
     */    
    public function setStatusColor($status, $object, $row)
    {
        $color = $object->status_color;
        if ($color)
        {
            $div = new TElement('span');
            $div->style = "text-shadow:none; font-size:12px; background: $color; border-radius:4px; padding:3px; color: white;";
            $div->add($status);
            return $div;
        }
        else
        {
            return $status;
        }
    }
    
    /**
     * Delete a record
     */
    function Delete($param)
    {
        try
        {
            TTransaction::open('permission');
            $user = SystemUser::newFromLogin(TSession::getValue('login'));
            $is_admin   = $user->checkInGroup( new SystemGroup(1) );
            $is_manager = $user->checkInGroup( new SystemGroup(3) );
            TTransaction::close();
            
            // security check
            if (!$is_admin AND !$is_manager)
            {
                throw new Exception(_t('Permission denied'));
            }
            
            // get the parameter $key
            $key = $param['key'];
            // open a transaction with database 'changeman'
            TTransaction::open('changeman');
            
            // instantiates object Issue
            $object = new Issue($key);
            
            // deletes the object from the database
            $object->delete();
            
            // close the transaction
            TTransaction::close();
            
            // reload the listing
            $this->onReload();
            
            // shows the success message
            new TMessage('info', TAdiantiCoreTranslator::translate('Record deleted'));
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
     * method show()
     * Shows the page
     */
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload();
        }
        parent::show();
    }
}
