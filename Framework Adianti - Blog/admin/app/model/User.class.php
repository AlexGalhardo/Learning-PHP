<?php
class User
{
    static public function autenticate($user, $pass)
    {
        if ($user == 'admin' and $pass == 'admin')
        {
            return TRUE;
        }
        else
        {
            throw new Exception(_t('Incorrect login'));
        }
    }
}
?>