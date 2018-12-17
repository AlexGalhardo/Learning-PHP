<?php

try {

	$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");

	$sql = "UPDATE usuarios SET email = 'abc@gmail.com' WHERE email = 'alex@gmail.com'";
	$sql = $pdo->query($sql);

	echo "Usuário atualizado com sucesso!";

	$sql = "INSERT INTO usuarios SET nome = 'pedrao', email = 'pedrao@gmail.com', senha = 'teste123'";
	$sql = $pdo->query($sql);

	echo "Usuário pedrao inserido com sucesso!";

} catch(PDOException $e){
	echo "ERRO: " . $e->getMessage();
}


?>