<?php
/**
 * Conexão Banco de Dados PDO
 */
try {
	global $pdo;
	$pdo = new PDO("mysql:dbname=mkt-original;host=localhost", "root", "");

} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

$limite = 3;

$patentes = array(
	
);