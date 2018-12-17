<?php

try {
	$dns = "mysql:dbname=cadastro_aprovacao;host=localhost";
	$dbuser = "root";
	$dbpassword = "";
	$pdo = new PDO($dsn, $dbuser, $dbpassword);
} catch(PODException $e){
	die($e->getMessage());
}

?>