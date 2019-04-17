<?php

require_once 'request.php';

try
{
    // delete objects by filters
    $location = 'http://localhost/contacts/contacts';
    $body = [];
    $body['filters'] = [ ['id', '>', 1], ['id', '<', '3']];
    print_r( request($location, 'DELETE', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
