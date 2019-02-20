<?php
/**
 * UpdateIssueForm Registration
 * @author  <your name here>
 */
class UpdateIssueForm extends TPage
{
    private $notebook;
    private $form; // form
    
    // trait with saveFile, saveFiles, ...
    use Adianti\Base\AdiantiFileSaveTrait;
    
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
        $id_user         = new TDBUniqueSearch('id_user', 'permission', 'SystemUser', 'id', 'name');
        $id_status       = new TDBCombo('id_status', 'changeman', 'Status', 'id', 'complete_description');
        $id_project      = new TDBCombo('id_project', 'changeman', 'Project', 'id', 'description');
        $id_priority     = new TDBCombo('id_priority', 'changeman', 'Priority', 'id', 'description_translated');
        $id_category     = new TDBCombo('id_category', 'changeman', 'Category', 'id', 'description_translated');
        $id_member       = new TCombo('id_member');
        $register_date   = new TDate('register_date');
        $close_date      = new TDate('close_date');
        $issue_time      = new TTime('issue_time');
        $close_time      = new TTime('close_time');
        $title           = new TEntry('title');
        $description     = new THtmlEditor('description');
        $solution        = new THtmlEditor('solution');
        $file            = new TMultiFile('file');
        $id_user->setMinLength(1);
        $file->enableFileHandling();
        
        TTransaction::open('permission');
        $members = SystemUser::getInGroups( [new SystemGroup(3), new SystemGroup(4) ]);
        $options = [];
        if ($members)
        {
            foreach ($members as $member)
            {
                $options[ $member->id ] = $member->name;
            }
        }
        $id_member->addItems($options);
        TTransaction::close();
        
        $this->form->addField($description);
        $this->form->addField($solution);
        
        $id_user->addValidation(_t('User'), new TRequiredValidator);
        $id_status->addValidation(_t('Status'), new TRequiredValidator);
        $id_project->addValidation(_t('Project'), new TRequiredValidator);
        $id_priority->addValidation(_t('Priority'), new TRequiredValidator);
        $id_category->addValidation(_t('Category'), new TRequiredValidator);
        $register_date->addValidation(_t('Start date'), new TRequiredValidator);
        $title->addValidation(_t('Title'), new TRequiredValidator);
        $description->addValidation(_t('Description'), new TRequiredValidator);
        
        // define the sizes
        $id->setSize('50%');
        $id_user->setSize('100%');
        $id_status->setSize('100%');
        $id_project->setSize('100%');
        $id_priority->setSize('100%');
        $id_category->setSize('100%');
        $id_member->setSize('100%');
        $register_date->setSize('50%');
        $close_date->setSize('50%');
        $issue_time->setSize('50%');
        $close_time->setSize('50%');
        $title->setSize('100%');
        $description->setSize('100%', 250);
        $solution->setSize('100%', 250);
        $register_date->setMask('yyyy-mm-dd');
        $close_date->setMask('yyyy-mm-dd');
        $id->setEditable(FALSE);
        
        // add a row for the field id
        $this->form->addFields( [new TLabel('ID')], [$id], [new TLabel(_t('User'))], [$id_user] );
        $this->form->addFields( [new TLabel(_t('Status'))], [$id_status], [new TLabel(_t('Project'))], [$id_project]);
        $this->form->addFields( [new TLabel(_t('Priority'))], [$id_priority], [new TLabel(_t('Category'))], [$id_category]);
        $this->form->addFields( [new TLabel(_t('Title'))], [$title], [new TLabel(_t('Assigned to'))], [$id_member]);
        $this->form->addFields( [new TLabel(_t('Start date'))], [$register_date, $issue_time], [new TLabel(_t('Due date'))], [$close_date, $close_time]);
        $this->form->addFields( [new TLabel(_t('Files'))], [$file] );
        
        $subnotebook = new BootstrapNotebookWrapper(new TNotebook);
        $subnotebook->appendPage(_t('Description'), $description);
        $subnotebook->appendPage(_t('Solution'), $solution);
        
        $this->form->addContent( [$subnotebook] );
        
        $this->form->addAction( _t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o green' );
        $this->form->addActionLink( _t('Issues'), new TAction(array('IssueList', 'onReload')), 'fa:table blue' );
        
        // creates the page structure using a vbox
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'IssueList'));
        $container->add($this->form);
        
        // add the vbox inside the page
        parent::add($container);
    }

    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    function onSave()
    {
        try
        {
            TTransaction::open('permission');
            $logged  = SystemUser::newFromLogin(TSession::getValue('login'));
            $prefs   = SystemPreference::getAllPreferences();
            TTransaction::close();
            
            // open a transaction with database 'changeman'
            TTransaction::open('changeman');
            
            // get the form data into an active record Issue
            $data = $this->form->getData();
            
            $object = new Issue;
            $object->fromArray( (array) $data );
            
            $status = new Status($object-> id_status);
            if ($status-> final_state == 'Y' AND empty($object-> close_date) ) // closed, send email
            {
                $object-> close_date = date('Y-m-d');
            }
            
            // form validation
            $this->form->validate();
            
            // stores the object
            $object->store();
            
            // copy file to target folder
            $this->saveFilesByComma($object, $data, 'file', 'files/tickets');
            
            if ($status-> final_state == 'Y') // closed, send email
            {
                $project = new Project($object-> id_project);
                
                TTransaction::open('permission');
                $issuer = new SystemUser($object-> id_user); // who has opened the issue
                TTransaction::close();
                
                $members = $project->getMembersAndManagers();
                
                $mail_template = file_get_contents('app/resources/ticket_close.html');
                $mail_template = str_replace('{SOLUTION}', $object-> solution, $mail_template);
                $mail_template = str_replace('{DESCRIPTION}', $object-> description, $mail_template);
                $mail_template = str_replace('{OPENER}',  $issuer-> name . ' ' .
                                                          $object-> register_date . ' ' .
                                                          $object-> issue_time, $mail_template);
                $mail_template = str_replace('{MEMBER}',  $logged-> name . ' ' .
                                                          $object-> close_date . ' ' .
                                                          date('H:i'), $mail_template);
                
                $mail = new TMail;
                $mail->setFrom($prefs['mail_from'], $prefs['mail_from']);
                $mail->setSubject(_t('Issue') . ' #'. $object-> id . ': ' . $object-> title . ' (' . $object-> status_name . ')');
                $mail->setHtmlBody($mail_template);
                
                $emails = explode(',', $issuer-> email);
                if ($emails)
                {
                    foreach ($emails as $email)
                    {
                        if ($email)
                        {
                            $mail->addAddress(trim($email), $issuer-> name);
                        }
                    }
                }
                
                foreach ($members as $member)
                {
                    $emails = explode(',', $member-> email);
                    foreach ($emails as $email)
                    {
                        if ($email)
                        {
                            $mail->addBCC(trim($email), $member-> name);
                        }
                    }
                }
                
                $mail->SetUseSmtp();
                $mail->SetSmtpHost($prefs['smtp_host'], $prefs['smtp_port']);
                $mail->SetSmtpUser($prefs['smtp_user'], $prefs['smtp_pass']);
                $mail->send();
            }
            
            // fill the form with the active record data
            $this->form->setData($data);
            
            // close the transaction
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
            // reload the listing
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
                
                // open a transaction with database 'changeman'
                TTransaction::open('changeman');
                
                // instantiates object Issue
                $object = new Issue($key);
                $object->file = explode(',', $object->file);
                
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
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
}
