<?php

try {

	$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");

	$sql = "DELETE FROM usuarios WHERE id = '5'";
	$sql = $pdo->query($sql);

	echo "Usuário deletado com sucesso!";

} catch (PDOException $e){

	echo "ERRO: " . $e->getMessage();

}


?>