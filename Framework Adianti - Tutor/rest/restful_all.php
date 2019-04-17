<?php
require_once 'request.php';

try
{
    // load objects by filter
    $body['limit'] = '3';
    $body['order'] = 'name';
    $body['direction'] = 'desc';
    $body['filters'] = [ ['state_id', '=', 1] ];
    
    $location = 'http://localhost/tutor/cities';
    print_r( request($location, 'GET', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
