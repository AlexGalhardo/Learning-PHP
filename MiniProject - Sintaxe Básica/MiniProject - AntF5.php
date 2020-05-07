<?php
if(isset($_POST['nome']) && !empty($_POST['nome'])){

	$nome = $_POST['nome'];
	file_put_contents("teste.txt", $nome, FILE_APPEND);
	echo "O nome enviado foi: " . $nome;

	/**
	 * Após enviar o dado, ele redireciona para a mesma página, para evitar código duplicado enviado
	 */
	header("Location: projeto-ant-f5.php");
}

?>
<form method="POST">
	<input type="text" name="nome" placeholder="digite o nome">
	<input type="submit" value="Enviar Nome">
</form>