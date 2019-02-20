<?php
/**
 * ViewIssueForm Registration
 * @author  <your name here>
 */
class ViewIssueForm extends TPage
{
    private $notes_area;
    private $subnotebook;
    private $form; // form
    private $attach_area;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Issue');
        $this->form->setFormTitle( _t('Issue') );
        
        // create the form fields
        $id              = new TEntry('id');
        $user            = new TEntry('user_name');
        $status          = new TEntry('status_name');
        $project         = new TEntry('project_name');
        $priority        = new TEntry('priority_name');
        $category        = new TEntry('category_name');
        $member          = new TEntry('member_name');
        $register_date   = new TEntry('register_date');
        $close_date      = new TEntry('close_date');
        $close_time      = new TEntry('close_time');
        $time            = new TEntry('issue_time');
        $title           = new TEntry('title');
        
        $user->setEditable(FALSE);
        $status->setEditable(FALSE);
        $project->setEditable(FALSE);
        $priority->setEditable(FALSE);
        $category->setEditable(FALSE);
        $member->setEditable(FALSE);
        $register_date->setEditable(FALSE);
        $close_date->setEditable(FALSE);
        $close_time->setEditable(FALSE);
        $time->setEditable(FALSE);
        $title->setEditable(FALSE);
        
        // define the sizes
        $id->setSize('50%');
        $user->setSize('100%');
        $status->setSize('100%');
        $project->setSize('100%');
        $priority->setSize('100%');
        $category->setSize('100%');
        $member->setSize('100%');
        $register_date->setSize('50%');
        $close_date->setSize('50%');
        $time->setSize('50%');
        $close_time->setSize('50%');
        $title->setSize('100%');
        $register_date->setMask('yyyy-mm-dd');
        $close_date->setMask('yyyy-mm-dd');
        $id->setEditable(FALSE);
        
        $this->form->addFields( [new TLabel('ID')], [$id], [new TLabel(_t('User'))], [$user] );
        $this->form->addFields( [new TLabel(_t('Status'))], [$status], [new TLabel(_t('Project'))], [$project]);
        $this->form->addFields( [new TLabel(_t('Priority'))], [$priority], [new TLabel(_t('Category'))], [$category]);
        $this->form->addFields( [new TLabel(_t('Title'))], [$title], [new TLabel(_t('Assigned to'))], [$member]);
        $this->form->addFields( [new TLabel(_t('Start date'))], [$register_date, $time], [new TLabel(_t('Due date'))], [$close_date, $close_time]);
        
        $this->subnotebook = new BootstrapNotebookWrapper(new TNotebook);
        $this->form->addContent( [$this->subnotebook] );
        
        $this->form->addActionLink( _t('Issues'), new TAction(array('IssueList', 'onReload')), 'fa:table blue' );
        
        $this->attach_area = new TVBox;
        $this->form->addContent( [$this->attach_area] );
        
        // creates the page structure using a vbox
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'IssueList'));
        $container->add($this->form);
        
        // add the vbox inside the page
        parent::add($container);
    }
    
    /**
     * method onView()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onView($param)
    {
        try
        {
            if (isset($param['key']))
            {
                // get the parameter $key
                $key=$param['key'];
                
                // open a transaction with database 'changeman'
                TTransaction::open('changeman');
                
                // instantiates object Issue
                $object = new Issue($key);
                $notes = $object-> notes;
                $notes_area_str = '';
                
                if (file_exists("attach/{$key}/$object->file"))
                {
                    $this->attach_area->add( TElement::tag('h4', _t('Attachment')) );
                    $this->attach_area->add( new THyperLink($object->file, "download.php?file=attach/{$key}/$object->file"));
                }
                
                if ($notes)
                {
                    foreach ($notes as $note)
                    {
                        TTransaction::open('permission');
                        $user = new SystemUser($note-> id_user);
                        TTransaction::close();
                        $notes_area_str .= '<u><b>'.$user-> name.'</b> '.
                                       '('.$note-> register_date . ' ' . $note-> register_time . ')</u>'.
                                       $note-> note . '<br>';
                    }
                }
                
                $description     = new TTextDisplay($object->description);
                $solution        = new TTextDisplay($object->solution);
                $notes_area      = new TTextDisplay($notes_area_str);
                $description->style = 'margin:10px;display:block';
                $solution->style = 'margin:10px;display:block';
                $notes_area->style = 'margin:10px;display:block';
                
                $this->subnotebook->appendPage(_t('Description'), $description);
                $this->subnotebook->appendPage(_t('Solution'), $solution);
                $this->subnotebook->appendPage(_t('Notes'), $notes_area);
                
                // fill the form with the active record data
                $this->form->setData($object);
                
                // close the transaction
                TTransaction::close();
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
        }
    }
}
