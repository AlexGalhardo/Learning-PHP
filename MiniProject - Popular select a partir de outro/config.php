<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/Learning-PHP7/MiniProject%20-%20Popular%20select%20a%20partir%20de%20outro/");
	$config['dbname'] = 'mp_popular_select';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://localhost/projeto_popularselect/");
	$config['dbname'] = 'mp_popular_select';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

$db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8;host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>