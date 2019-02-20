<?php

require_once 'request.php';

try
{
    // delete objects by filters
    $location = 'http://localhost/tutor/cities';
    $body = [];
    $body['filters'] = [ ['id', '>', 5], ['state_id', '=', '1']];
    print_r( request($location, 'DELETE', $body) );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
