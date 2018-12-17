<?php
try {
	$pdo = new PDO("mysql:dbname=mp_sistema_reservas;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}