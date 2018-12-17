<?php
try {
	$pdo = new PDO("mysql:dbname=mp_permissoes_usuarios;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}