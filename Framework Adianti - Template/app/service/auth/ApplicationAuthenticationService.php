<?php
use \Firebase\JWT\JWT;

class ApplicationAuthenticationService
{
    public static function authenticate($login, $password)
    {
        $ini  = AdiantiApplicationConfig::get();
        
        TTransaction::open('permission');
        $user = SystemUser::validate( $login );
        
        if ($user)
        {
            if (!empty($ini['permission']['auth_service']) and class_exists($ini['permission']['auth_service']))
            {
                $service = $ini['permission']['auth_service'];
                $service::authenticate( $login, $password );
            }
            else
            {
                SystemUser::authenticate( $login, $password );
            }
            
            $programs = $user->getPrograms();
            $programs['LoginForm'] = TRUE;
            
            TSession::setValue('logged', TRUE);
            TSession::setValue('login', $login);
            TSession::setValue('userid', $user->id);
            TSession::setValue('usergroupids', $user->getSystemUserGroupIds());
            TSession::setValue('userunitids', $user->getSystemUserUnitIds());
            TSession::setValue('username', $user->name);
            TSession::setValue('usermail', $user->email);
            TSession::setValue('frontpage', '');
            TSession::setValue('programs',$programs);
            
            if (!empty($user->unit))
            {
                TSession::setValue('userunitid',$user->unit->id);
            }
            
            // retister REST profile
            // SystemAccessLog::registerLogin();
            
            return $user;
        }
        
        TTransaction::close();
    }
    
    public static function fromToken($token)
    {
        $ini = AdiantiApplicationConfig::get();
        $key = APPLICATION_NAME . $ini['general']['seed'];
        
        if (empty($ini['general']['seed']))
        {
            throw new Exception('Application seed not defined');
        }
        
        $token = (array) JWT::decode($token, $key, array('HS256'));
        
        $login   = $token['user'];
        $userid  = $token['userid'];
        $name    = $token['username'];
        $email   = $token['usermail'];
        $expires = $token['expires'];
        
        if ($expires < strtotime('now'))
        {
            throw new Exception('Token expired. This operation is not allowed');
        }
        
        TSession::setValue('logged',   TRUE);
        TSession::setValue('login',    $login);
        TSession::setValue('userid',   $userid);
        TSession::setValue('username', $name);
        TSession::setValue('usermail', $email);
    }
}
