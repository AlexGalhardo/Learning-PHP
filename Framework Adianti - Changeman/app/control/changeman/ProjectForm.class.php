<?php
/**
 * ProjectForm Registration
 * @author  <your name here>
 */
class ProjectForm extends TStandardForm
{
    protected $notebook;
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // defines the database
        parent::setDatabase('changeman');
        
        // defines the active record
        parent::setActiveRecord('Project');
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Project');
        $this->form->setFormTitle(_t('Projects'));
        
        $criteria = new TCriteria;
        $criteria->add(new TFilter('active', '=', 'Y'), TExpression::OR_OPERATOR);
        $criteria->add(new TFilter('active', 'IS', NULL), TExpression::OR_OPERATOR);
        
        // create the form fields
        $id              = new TEntry('id');
        $description     = new TEntry('description');
        $members         = new TDBCheckGroup('members', 'permission', 'SystemUser', 'id', 'name', 'name', $criteria); 
        $id->setEditable(FALSE);
        
        // define the sizes
        $this->form->addFields( [new TLabel('ID')], [$id] );
        $this->form->addFields( [new TLabel(_t('Description'))], [$description] );
        $this->form->addFields( [new TLabel(_t('Users'))], [$members] );
        
        $id->setSize('30%');
        $description->setSize('80%');
        $members->setSize('80%');
        
        $members->setBreakItems(3);
        $members->setLayout('horizontal');
        
        foreach ($members->getLabels() as $key => $label)
        {
            $label->setSize(200);
        }
        
        // define the form action
        $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o green');
        $this->form->addAction(_t('New'), new TAction(array($this, 'onClear')), 'fa:eraser red');
        $this->form->addAction(_t('Back to the listing'), new TAction(array('ProjectList', 'onReload')), 'fa:table blue');
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'ProjectList'));
        $container->add($this->form);
        
        // add the form to the page
        parent::add($container);
    }
    
    
    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    public function onSave()
    {
        try
        {
            // open a transaction with database
            TTransaction::open($this->database);
            
            // get the form data
            $object = $this->form->getData($this->activeRecord);
            $this->form->validate();
            $object->store();
            $this->form->setData($object);
            
            ProjectMember::where('project_id', '=', $object->id)->delete();
            
            foreach ($object->members as $member_id)
            {
                $pm = new ProjectMember;
                $pm->project_id = $object->id;
                $pm->member_id = $member_id;
                $pm->store();
            }
            
            // close the transaction
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', AdiantiCoreTranslator::translate('Record saved'));
            
            return $object;
        }
        catch (Exception $e) // in case of exception
        {
            // get the form data
            $object = $this->form->getData();
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     * @param  $param An array containing the GET ($_GET) parameters
     */
    public function onEdit($param)
    {
        try
        {
            if (isset($param['key']))
            {
                $key=$param['key'];
                
                TTransaction::open($this->database);
                
                $class = $this->activeRecord;
                
                $object = new $class($key);
                
                $project_members = ProjectMember::where('project_id', '=', $object->id)->load();
                if ($project_members)
                {
                    $member_ids = array();
                    foreach ($project_members as $project_member)
                    {
                        $member_ids[] = $project_member->member_id;
                    }
                    $object->members = $member_ids;
                }
                
                // fill the form with the active record data
                $this->form->setData($object);
                
                // close the transaction
                TTransaction::close();
                
                return $object;
            }
            else
            {
                $this->form->clear();
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
}
