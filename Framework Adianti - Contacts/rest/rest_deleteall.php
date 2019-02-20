<?php
require_once 'post.php';

try
{
    $location = 'http://localhost/contacts/rest.php';
    
    $parameters = [];
    $parameters['class']   = 'ContactRestService';
    $parameters['method']  = 'deleteAll';
    $parameters['filters'] = [ ['id', '>', 3] ];
    
    print_r(post($location, $parameters));
}
catch (Exception $e)
{
    echo 'Error: '. $e->getMessage();
}
