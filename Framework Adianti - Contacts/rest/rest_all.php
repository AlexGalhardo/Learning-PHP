<?php
require_once 'post.php';

try
{
    $location = 'http://localhost/contacts/rest.php';
    
    $parameters = [];
    $parameters['class']   = 'ContactRestService';
    $parameters['method']  = 'loadAll';
    // $parameters['filters'] = [ ['id', '>', 1] ];
    
    print_r(post($location, $parameters));
}
catch (Exception $e)
{
    echo 'Error: '. $e->getMessage();
}
