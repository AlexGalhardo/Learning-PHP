<?php

require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
	define("BASE_URL", "http://localhost/Learning-PHP7/MiniProject%20-%20Galeria%20de%20Fotos/");
	$config['dbname'] = 'mp_galeria_fotos';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "https://crud-mvc.galhardoo.com");
	$config['dbname'] = 'mp_crud_mvc';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;

try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e){
	echo "ERRO: " . $e->getMessage();
	exit;
}