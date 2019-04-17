<?php
require_once 'post.php';

try
{
    $location = 'http://localhost/tutor/rest.php';
    $parameters = array();
    $parameters['class']  = 'CityService';
    $parameters['method'] = 'delete';
    $parameters['id']     = 6;

    post($location, $parameters);
}
catch (Exception $e)
{
    echo 'Error: '. $e->getMessage();
}
