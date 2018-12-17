<?php
try {
	$pdo = new PDO("mysql:dbname=mp_caixa_eletronico;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}