<?php

global $routes;

$routes = array();

$routes['/galeria/{id}/{titulo}'] = '/galeria/abrir/:id/:titulo';
$routes['/news/{id}'] = '/noticia/abrir/:id';
$routes['/n/{titulo}'] = '/noticia/abrirtitulo/:titulo';