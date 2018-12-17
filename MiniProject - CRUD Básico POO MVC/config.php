<?php

require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
	define("BASE_URL", "http://localhost/crud_mvc/");
	$config['dbname'] = 'mp_crud_mvc';
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