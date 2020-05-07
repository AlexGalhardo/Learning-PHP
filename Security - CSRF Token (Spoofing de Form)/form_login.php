<?php
/**
 * Copiar formulário de um site em produção
 * e enviar dados no localhost através da action
 */

session_start();
if(!isset($_SESSION['csrf_token'])){
	$_SESSION['csrf_token'] = md5(time().rand(0, 999));
}

if(!empty($_POST['email'])){
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if($_POST['csrf_token'] == $_SESSION['csrf_token']){
		if($email == 'teste@gmail.com' && senha == '123'){
		echo "Acesso ok";
		} else {
			echo "Acesso negado!";
		}
	} else {
		echo "Este formulário foi enviado por outro site!";
	}
}

?>

<form method="POST" action="https://b7web.com.br/seg/form_online.php">
	Email:
	<input type="email" name="email"><br><br>

	Senha:
	<input type="password" name="senha"><br><br>

	<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

	<input type="submit" value='Enviar'>

</form>