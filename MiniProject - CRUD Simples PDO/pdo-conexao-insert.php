<?php

/**
 * Inserir dados no banco de dados usando PDO
 */

try {

	$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");

	$nome = "alex";
	$email = "alex@gmail.com";
	$senha = md5("senhateste");

	/**
	 * Lembrando que aspas duplas interpretam variáveis
	 */
	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$senha', senha '$senha'";
	$sql = $pdo->query($sql);

	echo "Usuário inserido com sucesso!" . $pdo->lastInsertId();


} catch(PDOException $e){

	echo "Erro: " . $e->getMessage();

}

?>