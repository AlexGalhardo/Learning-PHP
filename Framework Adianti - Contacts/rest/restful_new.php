<?php
require_once 'request.php';

try
{
    // create object
    $body = [];
    $body['name'] = 'Peter';
    $location = 'http://localhost/contacts/contacts';
    print_r( request($location, 'POST', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
