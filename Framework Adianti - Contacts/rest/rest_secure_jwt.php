<?php
require_once 'request.php';

try
{
    $location = 'http://git/contacts/rest.php';
    $parameters = array();
    $parameters['class']    = 'ApplicationAuthenticationRestService';
    $parameters['method']   = 'getToken';
    $parameters['login']    = 'user';
    $parameters['password'] = 'user';
    
    $token = request($location, 'GET', $parameters, 'Basic 123');
    
    $location = 'http://git/contacts/rest.php';
    $parameters = array();
    $parameters['class']  = 'ContactRestService';
    $parameters['method'] = 'load';
    $parameters['id']     = '1';
    
    print_r( request($location, 'GET', $parameters, 'Bearer ' . $token) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
