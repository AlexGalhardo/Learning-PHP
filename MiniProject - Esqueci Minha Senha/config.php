<?php

try {

	$pdo = new PDO("mysql:dbname=mp_esqueci_senha;host=localhost", "root", "");

} catch (PDOException $e){
	echo "ERRO: " . $e->getMessage();
	exit;
}