<?php
require_once 'request.php';

try
{
    // load objects by filter
    $body['limit'] = '3';
    $body['order'] = 'name';
    $body['direction'] = 'desc';
    // $body['filters'] = [ ['id', '>', 1] ];
    
    $location = 'http://localhost/contacts/contacts';
    print_r( request($location, 'GET', $body, 'Basic 123') );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
