<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_loginajax;host=localhost", "root", "root");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

if(isset($_POST['email']) && !empty($_POST['email'])) {

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", md5($senha));
	$sql->execute();

	if($sql->rowCount() > 0) {
		echo "Usuário logado com sucesso!";
	} else {
		echo "E-mail e/ou senha estão errados!";
	}

} else {
	echo "Digite um e-mail e/ou senha!";
}