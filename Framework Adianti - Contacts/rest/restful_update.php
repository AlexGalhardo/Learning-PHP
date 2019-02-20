<?php
require_once 'request.php';

try
{
    // update object
    $body = [];
    $body['name']     = 'Peter Saurus';
    $location = 'http://localhost/contacts/contacts/3';
    print_r( request($location, 'PUT', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
