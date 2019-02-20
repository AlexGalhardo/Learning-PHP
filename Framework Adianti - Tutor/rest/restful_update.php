<?php
require_once 'request.php';

try
{
    // update object
    $body = [];
    $body['name']     = 'TESTE2';
    $body['state_id'] = '1';
    $location = 'http://localhost/tutor/cities/6';
    print_r( request($location, 'PUT', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
