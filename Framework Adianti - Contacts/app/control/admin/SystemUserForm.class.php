<?php
/**
 * SystemUserForm
 *
 * @version    1.0
 * @package    control
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SystemUserForm extends TPage
{
    protected $form; // form
    protected $program_list;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_System_user');
        $this->form->setFormTitle( _t('User') );
        
        // create the form fields
        $id                  = new TEntry('id');
        $name                = new TEntry('name');
        $login               = new TEntry('login');
        $password            = new TPassword('password');
        $repassword          = new TPassword('repassword');
        $email               = new TEntry('email');
        $unit_id             = new TDBCombo('system_unit_id','permission','SystemUnit','id','name');
        $program_id          = new TDBSeekButton('program_id', 'permission', 'form_System_user', 'SystemProgram', 'name', 'program_id', 'program_name');
        $program_name        = new TEntry('program_name');
        $groups              = new TDBCheckGroup('groups','permission','SystemGroup','id','name');
        $frontpage_id        = new TDBUniqueSearch('frontpage_id', 'permission', 'SystemProgram', 'id', 'name', 'name');
        $units               = new TDBCheckGroup('units','permission','SystemUnit','id','name');
        
        $units->setLayout('horizontal');
        if ($units->getLabels())
        {
            foreach ($units->getLabels() as $label)
            {
                $label->setSize(200);
            }
        }
        
        $groups->setLayout('horizontal');
        if ($groups->getLabels())
        {
            foreach ($groups->getLabels() as $label)
            {
                $label->setSize(200);
            }
        }
        
        $btn = $this->form->addAction( _t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction( _t('Clear'), new TAction(array($this, 'onEdit')), 'fa:eraser red');
        $this->form->addAction( _t('Back'), new TAction(array('SystemUserList','onReload')), 'fa:arrow-circle-o-left blue');
        
        $add_button  = TButton::create('add',  array($this,'onAddProgram'), _t('Add'), 'fa:plus green');
        
        $this->form->addField($program_id);
        $this->form->addField($program_name);
        $this->form->addField($add_button);
        
        $this->program_list = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->program_list->setHeight(180);
        $this->program_list->makeScrollable();
        $this->program_list->style='width: 100%';
        $this->program_list->id = 'program_list';
        $this->program_list->disableDefaultClick();
        $this->program_list->addQuickColumn('', 'delete', 'center', '5%');
        $this->program_list->addQuickColumn('Id', 'id', 'left', '10%');
        $this->program_list->addQuickColumn(_t('Program'), 'name', 'left', '85%');
        $this->program_list->createModel();
        
        $hbox = new THBox;
        $hbox->add($program_id);
        $hbox->add($program_name, 'display:initial');
        $hbox->add($add_button);
        $hbox->style = 'margin: 4px';
        $vbox = new TVBox;
        $vbox->style='width:100%';
        $vbox->add( $hbox );
        $vbox->add(TPanelGroup::pack('', $this->program_list));

        // define the sizes
        $id->setSize('50%');
        $name->setSize('100%');
        $login->setSize('100%');
        $password->setSize('100%');
        $repassword->setSize('100%');
        $email->setSize('100%');
        $unit_id->setSize('100%');
        $frontpage_id->setSize('100%');
        $program_id->setSize('30');
        $program_name->setSize('calc(100% - 200px)');
        $frontpage_id->setMinLength(1);
        
        // outros
        $id->setEditable(false);
        $program_name->setEditable(false);
        
        // validations
        $name->addValidation(_t('Name'), new TRequiredValidator);
        $login->addValidation('Login', new TRequiredValidator);
        $email->addValidation('Email', new TEmailValidator);
        
        $this->form->addFields( [new TLabel('ID')], [$id],  [new TLabel(_t('Name'))], [$name] );
        $this->form->addFields( [new TLabel(_t('Login'))], [$login],  [new TLabel(_t('Email'))], [$email] );
        $this->form->addFields( [new TLabel(_t('Main unit'))], [$unit_id],  [new TLabel(_t('Front page'))], [$frontpage_id] );
        $this->form->addFields( [new TLabel(_t('Password'))], [$password],  [new TLabel(_t('Password confirmation'))], [$repassword] );
        $this->form->addFields( [new TFormSeparator(_t('Units'))] );
        $this->form->addFields( [$units] );
        $this->form->addFields( [new TFormSeparator(_t('Groups'))] );
        $this->form->addFields( [$groups] );
        $this->form->addFields( [new TFormSeparator(_t('Programs'))] );
        $this->form->addFields( [$vbox] );
        
        $container = new TVBox;
        $container->style = 'width: 90%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'SystemUserList'));
        $container->add($this->form);

        // add the container to the page
        parent::add($container);
    }

    /**
     * Remove program from session
     */
    public static function deleteProgram($param)
    {
        $programs = TSession::getValue('program_list');
        unset($programs[ $param['id'] ]);
        TSession::setValue('program_list', $programs);
    }
    
    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    public static function onSave($param)
    {
        try
        {
            // open a transaction with database 'permission'
            TTransaction::open('permission');
            
            $object = new SystemUser;
            $object->fromArray( $param );
            
            $senha = $object->password;
            
            if( empty($object->login) )
            {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', _t('Login')));
            }
            
            if( empty($object->id) )
            {
                if (SystemUser::newFromLogin($object->login) instanceof SystemUser)
                {
                    throw new Exception(_t('An user with this login is already registered'));
                }
                
                if (SystemUser::newFromEmail($object->email) instanceof SystemUser)
                {
                    throw new Exception(_t('An user with this e-mail is already registered'));
                }
                
                if ( empty($object->password) )
                {
                    throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', _t('Password')));
                }
                
                $object->active = 'Y';
            }
            
            if( $object->password )
            {
                if( $object->password !== $param['repassword'] )
                    throw new Exception(_t('The passwords do not match'));
                
                $object->password = md5($object->password);
            }
            else
            {
                unset($object->password);
            }
            
            $object->store();
            $object->clearParts();
            
            if( !empty($param['groups']) )
            {
                foreach( $param['groups'] as $group_id )
                {
                    $object->addSystemUserGroup( new SystemGroup($group_id) );
                }
            }
            
            if( !empty($param['units']) )
            {
                foreach( $param['units'] as $unit_id )
                {
                    $object->addSystemUserUnit( new SystemUnit($unit_id) );
                }
            }
            
            $programs = TSession::getValue('program_list');
            if (!empty($programs))
            {
                foreach ($programs as $program)
                {
                    $object->addSystemUserProgram( new SystemProgram( $program['id'] ) );
                }
            }
            
            $data = new stdClass;
            $data->id = $object->id;
            TForm::sendData('form_System_user', $data);
            
            // close the transaction
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
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
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onEdit($param)
    {
        try
        {
            if (isset($param['key']))
            {
                // get the parameter $key
                $key=$param['key'];
                
                // open a transaction with database 'permission'
                TTransaction::open('permission');
                
                // instantiates object System_user
                $object = new SystemUser($key);
                
                unset($object->password);
                
                $groups = array();
                $units  = array();
                
                if( $groups_db = $object->getSystemUserGroups() )
                {
                    foreach( $groups_db as $group )
                    {
                        $groups[] = $group->id;
                    }
                }
                
                if( $units_db = $object->getSystemUserUnits() )
                {
                    foreach( $units_db as $unit )
                    {
                        $units[] = $unit->id;
                    }
                }
                
                $data = array();
                foreach ($object->getSystemUserPrograms() as $program)
                {
                    $data[$program->id] = $program->toArray();
                    
                    $item = new stdClass;
                    $item->id = $program->id;
                    $item->name = $program->name;
                    
                    $i = new TElement('i');
                    $i->{'class'} = 'fa fa-trash red';
                    $btn = new TElement('a');
                    $btn->{'onclick'} = "__adianti_ajax_exec('class=SystemUserForm&method=deleteProgram&id={$program->id}');$(this).closest('tr').remove();";
                    $btn->{'class'} = 'btn btn-default btn-sm';
                    $btn->add( $i );
                    
                    $item->delete = $btn;
                    $tr = $this->program_list->addItem($item);
                    $tr->{'style'} = 'width: 100%;display: inline-table;';
                }
                
                $object->groups = $groups;
                $object->units  = $units;
                
                // fill the form with the active record data
                $this->form->setData($object);
                
                // close the transaction
                TTransaction::close();
                
                TSession::setValue('program_list', $data);
            }
            else
            {
                $this->form->clear();
                TSession::setValue('program_list', null);
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
     * Add a program
     */
    public static function onAddProgram($param)
    {
        try
        {
            $id = $param['program_id'];
            $program_list = TSession::getValue('program_list');
            
            if (!empty($id) AND empty($program_list[$id]))
            {
                TTransaction::open('permission');
                $program = SystemProgram::find($id);
                $program_list[$id] = $program->toArray();
                TSession::setValue('program_list', $program_list);
                TTransaction::close();
                
                $i = new TElement('i');
                $i->{'class'} = 'fa fa-trash red';
                $btn = new TElement('a');
                $btn->{'onclick'} = "__adianti_ajax_exec(\'class=SystemGroupForm&method=deleteProgram&id=$id\');$(this).closest(\'tr\').remove();";
                $btn->{'class'} = 'btn btn-default btn-sm';
                $btn->add($i);
                
                $tr = new TTableRow;
                $tr->{'class'} = 'tdatagrid_row_odd';
                $tr->{'style'} = 'width: 100%;display: inline-table;';
                $cell = $tr->addCell( $btn );
                $cell->{'style'}='text-align:center';
                $cell->{'class'}='tdatagrid_cell';
                $cell->{'width'} = '5%';
                $cell = $tr->addCell( $program->id );
                $cell->{'class'}='tdatagrid_cell';
                $cell->{'width'} = '10%';
                $cell = $tr->addCell( $program->name );
                $cell->{'class'}='tdatagrid_cell';
                $cell->{'width'} = '85%';
                
                TScript::create("tdatagrid_add_serialized_row('program_list', '$tr');");
                
                $data = new stdClass;
                $data->program_id = '';
                $data->program_name = '';
                TForm::sendData('form_System_user', $data);
            }
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
