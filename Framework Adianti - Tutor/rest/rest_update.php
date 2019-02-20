<?php
require_once 'post.php';

try
{
    $location = 'http://localhost/tutor/rest.php';
    $parameters = array();
    $parameters['class'] = 'CityService';
    $parameters['method'] = 'store';
    $parameters['data'] = ['name' => 'Bento Gonçalves ok', 'state_id' => '1', 'id' => 6 ];

    print_r(post($location, $parameters));
}
catch (Exception $e)
{
    echo 'Error: '. $e->getMessage();
}
