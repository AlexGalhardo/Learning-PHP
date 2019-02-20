<?php
/**
 * NoteForm Registration
 * @author  <your name here>
 */
class NoteForm extends TPage
{
    private $notebook;
    private $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Note');
        $this->form->setFormTitle( _t('Note') );
        
        // create the form fields
        $id_issue    = new THidden('id_issue');
        $note        = new THtmlEditor('note');

        // define the sizes
        $note->setSize('100%', 200);

        $this->form->addFields( [$id_issue] );
        $this->form->addFields( [$note] );
        $this->form->addAction( _t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        
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
            $logged = SystemUser::newFromLogin(TSession::getValue('login'));
            $prefs  = SystemPreference::getAllPreferences();
            TTransaction::close();
            
            // open a transaction with database 'changeman'
            TTransaction::open('changeman');
            
            // get the form data into an active record Note
            $object = $this->form->getData('Note');
            $object-> id_user = $logged-> id;
            $object-> register_date = date('Y-m-d');
            $object-> register_time = date('H:i');
             
            // form validation
            $this->form->validate();
            
            // stores the object
            $object->store();
            
            $issue = new Issue($object-> id_issue);
            $project = new Project($issue-> id_project);
            
            $members = $project->getMembersAndManagers();
            // close the transaction
            TTransaction::close();
            
            TTransaction::open('permission');
            $issuer = new SystemUser($issue-> id_user); // who has opened the issue
            TTransaction::close();
            
            // shows the success message
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
            
            $mail_template = file_get_contents('app/resources/note.html');
            $mail_template = str_replace('{DESCRIPTION}', $issue-> description, $mail_template);
            $mail_template = str_replace('{OPENER}',      $issuer-> name . ' ' .
                                                          $issue-> register_date . ' ' .
                                                          $issue-> issue_time, $mail_template);
                                                          
            $mail_template = str_replace('{NOTE}',        $object-> note, $mail_template);
            $mail_template = str_replace('{MEMBER}',      $logged-> name . ' ' .
                                                          $object-> register_date . ' ' .
                                                          $object-> register_time, $mail_template);
                                                          
            $mail = new TMail;
            $mail->setFrom($prefs['mail_from'], $prefs['mail_from']);
            $mail->setSubject(_t('Note') . ' #'. $issue-> id . ': ' . $issue-> title);
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
            
            // fill the form with the active record data
            $this->form->setData($object);
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
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
                
                // instantiates object Note
                $object = new StdClass;
                $object-> id_issue = (int) $key;
                
                // fill the form with the active record data
                $this->form->setData($object);
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
