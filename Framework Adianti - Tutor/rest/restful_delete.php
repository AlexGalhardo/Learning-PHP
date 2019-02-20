<?php
require_once 'request.php';

try
{
    // delete object
    $location = 'http://localhost/tutor/cities/6';
    print_r( request($location, 'DELETE') );
}
catch (Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}
