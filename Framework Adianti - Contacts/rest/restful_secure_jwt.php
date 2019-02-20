<?php
require_once 'request.php';

try
{
    $location = 'http://localhost/contacts/auth/user/user';
    $token = request($location, 'GET', [], 'Basic 123');
    var_dump($token);
    
    $location = 'http://localhost/contacts/contacts/1';
    var_dump(request($location, 'GET', [], 'Bearer ' . $token));
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
