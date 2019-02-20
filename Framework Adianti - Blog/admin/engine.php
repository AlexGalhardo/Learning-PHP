<?php
require_once 'init.php';

class TApplication extends AdiantiCoreApplication
{
    static public function run($debug = FALSE)
    {
        new TSession;
        
        if ($_REQUEST)
        {
            $class = isset($_REQUEST['class']) ? $_REQUEST['class'] : '';
            
            if (!TSession::getValue('logged') AND $class !== 'LoginForm')
            {
                new TMessage('error', 'Not logged');
                return;
            }
            parent::run($debug);
        }
    }
}

TApplication::run(TRUE);
