<?php
require_once 'post.php';

try
{
    $location = 'http://localhost/tutor/rest.php';
    $parameters = array();
    $parameters['class']      = 'ProductService';
    $parameters['method']     = 'getBetween';
    $parameters['from']       = '1';
    $parameters['to']         = '3';
    
    print_r(post($location, $parameters));
}
catch (Exception $e)
{
    echo 'Error: '. $e->getMessage();
}
