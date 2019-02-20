<?php
/**
 * NewIssueForm Registration
 * @author  <your name here>
 */
class NewIssueForm extends TPage
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
        
        $this->form = new BootstrapFormBuilder('form_Issue');
        $this->form->setFormTitle(_t('Issue'));
        
        // create the form fields
        $id              = new TEntry('id');
        $id_project      = new TCombo('id_project');
        $id_priority     = new TDBCombo('id_priority', 'changeman', 'Priority', 'id', 'description_translated');
        $id_category     = new TDBCombo('id_category', 'changeman', 'Category', 'id', 'description_translated');
        $register_date   = new TDate('register_date');
        $time            = new TTime('issue_time');
        $title           = new TEntry('title');
        $description     = new THtmlEditor('description');
        $file            = new TMultiFile('file');
        
        $id->setEditable(FALSE);
        $register_date->setValue(date('Y-m-d'));
        $register_date->setMask('yyyy-mm-dd');
        $time->setValue(date('H:i'));
        $id_priority->setValue(2); // default
        $file->enableFileHandling();
        
        TTransaction::open('permission');
        $logged = SystemUser::newFromLogin(TSession::getValue('login'));
        TTransaction::close();
        
        TTransaction::open('changeman');
        $projects = Project::getUserProjects( $logged );
        $project_ids = array();
        foreach ($projects as $project)
        {
            $project_ids[$project->id] = $project->description;
        }
        TTransaction::close();
        
        $id_project->addItems($project_ids);
        
        // if just one project, its the default
        if (count($projects)==1)
        {
            $project_keys = array_keys($project_ids);
            $id_project->setValue($project_keys[0]);
        }
        
        $id_project->addValidation(_t('Project'), new TRequiredValidator);
        $id_priority->addValidation(_t('Priority'), new TRequiredValidator);
        $id_category->addValidation(_t('Category'), new TRequiredValidator);
        $register_date->addValidation(_t('Start date'), new TRequiredValidator);
        $title->addValidation(_t('Title'), new TRequiredValidator);
        $description->addValidation(_t('Description'), new TRequiredValidator);
        
        // define the sizes
        $id_project->setSize('100%');
        $id_priority->setSize('100%');
        $id_category->setSize('100%');
        $register_date->setSize('50%');
        $file->setSize('100%');
        $time->setSize('50%');
        $title->setSize('100%');
        $description->setSize('100%', 400);

        $this->form->addFields( [new TLabel('Id')],           [$id],          [new TLabel(_t('Title'))], [$title]);
        $this->form->addFields( [new TLabel(_t('Project'))],  [$id_project],  [new TLabel(_t('Start date'))], [$register_date, $time] );
        $this->form->addFields( [new TLabel(_t('Priority'))], [$id_priority], [$lbl=new TLabel(_t('Category'))], [$id_category]);
        $this->form->addFields( [new TLabel(_t('Files'))], [$file]);
        
        $label_description = new TLabel(_t('Description'));
        $label_description->setFontStyle('b');
        $label_description->style.=';float:left';
        
        $this->form->addContent( [$label_description] );
        $this->form->addFields( [$description] );
        $btn = $this->form->addAction( _t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        
        // creates the page structure using a vbox
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
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
            $logged = SystemUser::newFromLogin(TSession::getValue('login'));
            $prefs  = SystemPreference::getAllPreferences();
            TTransaction::close();
            
            // open a transaction with database 'changeman'
            TTransaction::open('changeman');
            // get the form data into an active record Issue
            $data = $this->form->getData();
            
            $object = new Issue;
            $object->fromArray( (array) $data);
            
            // standard values
            $object-> id_user   = $logged-> id;
            $object-> id_status = 1; // NEW
            
            // form validation
            $this->form->validate();
            
            // stores the object
            $object->store();
            
            // copy file to target folder
            $this->saveFilesByComma($object, $data, 'file', 'files/tickets');
            
            $project = new Project($object-> id_project);
            
            // read email configuration file
            $members = $project->getMembersAndManagers();
            $status_name = $object-> status_name;
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
            
            $mail_template = file_get_contents('app/resources/ticket_open.html');
            $mail_template = str_replace('{DESCRIPTION}', $object-> description, $mail_template);
            $mail_template = str_replace('{OPENER}',      $logged-> name . ' ' .
                                                          $object-> register_date . ' ' .
                                                          $object-> issue_time, $mail_template);
            
            $mail = new TMail;
            $mail->setFrom($prefs['mail_from'], $prefs['mail_from']);
            $mail->setSubject(_t('Issue') . ' #'. $object-> id . ': ' . $object-> title . ' (' . $status_name . ')');
            $mail->setHtmlBody($mail_template);
            
            $emails = explode(',', $logged-> email);
            if ($emails)
            {
                foreach ($emails as $email)
                {
                    if ($email)
                    {
                        $mail->addAddress(trim($email), $logged-> name);
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
            
            if (isset($target_file))
            {
                $mail->addAttach($target_file);
            }
            
            $mail->SetUseSmtp();
            $mail->SetSmtpHost($prefs['smtp_host'], $prefs['smtp_port']);
            $mail->SetSmtpUser($prefs['smtp_user'], $prefs['smtp_pass']);
            $mail->send();
            
            $data->id = $object->id;
            
            // fill the form with the active record data
            $this->form->setData($data);
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage() . '<br>' . _t('Try again'));
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
