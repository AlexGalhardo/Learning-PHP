<?php
require_once 'request.php';

try
{
    // load object by id
    $location = 'http://localhost/tutor/cities/1';
    print_r( request($location, 'GET') );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
