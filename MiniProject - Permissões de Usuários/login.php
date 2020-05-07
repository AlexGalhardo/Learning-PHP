<?php

session_start();

require 'config.php';

require 'classes/usuarios.class.php';

if(!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$usuarios = new Usuarios($pdo);

	if($usuarios->fazerLogin($email, $senha)) {
		header("Location: index.php");
		exit;
	} else {
		echo "Usuário e/ou senha estão errados!";
	}
}

?>
<h1>Login</h1>
<form method="POST">
	E-mail:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Entrar" />
</form>