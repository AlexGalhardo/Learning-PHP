<?php
require_once 'post.php';

try
{
    $location = 'http://localhost/tutor/rest.php';
    $parameters = array();
    $parameters['class'] = 'CityService';
    $parameters['method'] = 'load';
    $parameters['id'] = '1';

    print_r(post($location, $parameters));
}
catch (Exception $e)
{
    echo 'Error: '. $e->getMessage();
}
