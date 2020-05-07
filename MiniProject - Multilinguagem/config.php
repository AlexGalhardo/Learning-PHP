<?php

try {
	global $pdo;
	$pdo = new PDO("mysql:dbname=mp_multilinguagem;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}