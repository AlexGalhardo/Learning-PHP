<?php
try {
	$pdo = new PDO("mysql:dbname=mp_lixeira_de_itens;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}