<?php
/**
 * Login form
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class LoginForm extends TPage
{
    protected $form; // formulário
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct($param)
    {
        parent::__construct();

        $table = new TTable;
        $table->width = '100%';
        // creates the form
        $this->form = new TForm('form_login');
        $this->form->class = 'tform';
        $this->form->style = 'max-width: 450px; margin:auto; margin-top:120px;';

        // add the notebook inside the form
        $this->form->add($table);

        // create the form fields
        $login = new TEntry('login');
        $password = new TPassword('password');
        
        // define the sizes
        $login->setSize('70%', 40);
        $password->setSize('70%', 40);

        $login->style = 'height:35px; font-size:14px;float:left;border-bottom-left-radius: 0;border-top-left-radius: 0;';
        $password->style = 'height:35px;margin-bottom: 15px;font-size:14px;float:left;border-bottom-left-radius: 0;border-top-left-radius: 0;';

        $row=$table->addRow();
        $row->addCell( new TLabel('Log in') )->colspan = 2;
        $row->class='tformtitle';

        $login->placeholder = _t('User');
        $password->placeholder = _t('Password');

        $user = '<span style="float:left;width:35px;margin-left:45px;height:35px;" class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>';
        $locker = '<span style="float:left;width:35px;margin-left:45px;height:35px;" class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>';

        $container1 = new TElement('div');
        $container1->add($user);
        $container1->add($login);

        $container2 = new TElement('div');
        $container2->add($locker);
        $container2->add($password);

        $row=$table->addRow();
        $row->addCell($container1)->colspan = 2;

        // add a row for the field password
        $row=$table->addRow();        
        $row->addCell($container2)->colspan = 2;
        
        // create an action button (save)
        $save_button=new TButton('save');
        // define the button action
        $save_button->setAction(new TAction(array($this, 'onLogin')), _t('Log in'));
        $save_button->class = 'btn btn-success';
        $save_button->style = 'font-size:18px;width:90%;padding:10px';

        $row=$table->addRow();
        $row->class = 'tformaction';
        $cell = $row->addCell( $save_button );
        $cell->colspan = 2;
        $cell->style = 'text-align:center';

        $this->form->setFields(array($login, $password, $save_button));

        // add the form to the page
        parent::add($this->form);
    }
    
    /**
     * Validate the login
     */
    public function onLogin()
    {
        try
        {
            TTransaction::open('blog');
            $data = $this->form->getData('StdClass');
            
            // validate form data
            $this->form->validate();
            
            $auth = User::autenticate($data->{'login'}, $data->{'password'} );
            if ($auth)
            {
                TSession::setValue('logged', TRUE);
                TSession::setValue('login', $data-> login );
                // reload page
                AdiantiCoreApplication::gotoPage('SetupPage', 'onSetup');
            }
            TTransaction::close();
            // finaliza a transação
        }
        catch (Exception $e) // em caso de exceção
        {
            TSession::setValue('logged', FALSE);
            
            // exibe a mensagem gerada pela exceção
            new TMessage('error', $e->getMessage());
            // desfaz todas alterações no banco de dados
            TTransaction::rollback();
        }
    }
    
    /**
     * método onLogout
     * Executado quando o usuário clicar no botão logout
     */
    public static function onLogout()
    {
        TSession::setValue('logged', FALSE);
        TApplication::gotoPage('LoginForm', '');
    }
}
