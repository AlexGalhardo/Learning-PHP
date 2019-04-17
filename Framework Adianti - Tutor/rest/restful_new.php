<?php
require_once 'request.php';

try
{
    // create object
    $body = [];
    $body['name'] = 'TESTE';
    $body['state_id'] = '1';
    $location = 'http://localhost/tutor/cities';
    print_r( request($location, 'POST', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
