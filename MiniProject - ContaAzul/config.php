<?php
require 'environment.php';

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'contazul';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	$config['dbname'] = 'contaazul';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}
?>