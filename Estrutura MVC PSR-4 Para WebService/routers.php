<?php
global $routes;
$routes = array();

$routes['/teste'] = '/home/testando';
$routes['/usuarios/{id}'] = '/home/visualizar_usuarios/:id';