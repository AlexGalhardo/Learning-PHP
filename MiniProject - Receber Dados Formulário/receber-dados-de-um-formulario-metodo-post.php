<?php
/**
 * Verifica se a variavel globl $_POST recebeu dados do formulário
 */

/**
 * Também verifique se o usuário enviou alguma coisa
 */
if(isset($_POST) && !empty($_POST)){

	if(isset($_POST['senha']) && isset($_POST['email'])){
		echo "O usuário enviou os dados";
		echo "<br><br>Os dados enviados foram: email: " .$_POST["email"] . "e senha: " . $_POST["senha"];
	}
}
?>

<form method="POST">
	Email:<br>
	<input type="text" name="email"><br><br>

	Senha:<br>
	<input type="password" name="senha"><br><br>

	<input type="submit" value="Enviar dados">
</form>