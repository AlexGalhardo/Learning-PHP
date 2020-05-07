<?php

if(isset($_POST['nome']) && !empty($_POST['nome'])){

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	require 'config.php';

	$pdo->query("SELECT INTO usuarios SET nome = '$nome', email = '$email'");

	$id = $pdo->lastInsertId();

	$md5 = md5($id);

	$link = "http://cadastro-confirma.galhardoo.com/confirmar.php?id=".$md5;

	$assunto = "Confirme seu cadastro";
	$msg = "Clique no link abaixo para confirmar seu cadastro: \n\n". $link;
	$headers = "From: alexgalhardo@galhardoo.com"."\r\n"."X-Mailer: PHP/".phpversion();

	mail($email, $assunto, $msg, $headers);

	echo "<h2>Ok! Confirme seu cadastro agora!</h2>";
	exit;
}

?>

<form method="POST">
	Nome:<br>
	<input type="text" name="nome"><br><br>

	Email:<br>
	<input type="email" name="email"><br>

	<input type="submit" value="Cadastrar">
</form>