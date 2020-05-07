<?php
/**
 * Fazer conexão banco de dados
 */
try {
	$pdo = new PDO("mysql:dbname=projeto-convite;host=localhost", "root", "");

} catch(PDOException $e){
	echo "ERRO: " . $e->getMessage();
}

?>