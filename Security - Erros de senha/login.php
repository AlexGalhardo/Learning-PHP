<?php 

// ataque de força bruta
// ficar tentando várias senhas, até conseguir acertar
// ataque mais clássico

if(!empty($_POST['email'])){
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3){
		echo "Seu acesso está bloqueado!";
	} else {

		if($email == 'teste@hotmail.com'&& $senha == '123'){
			echo "ACESSO OK!";
		} else {

			if(!isset($_SESSION['login_tentativas'])){
				$_SESSION['login_tentativas'] = 0;
			}

			$_SESSION['login_tentativas']++;
			/**
			 * uma alternativa é salvar o email enviado e bloquear ele no banco de dados
			 */
			
			/**
			 * bloquear a sessão por determinado tempo, por exemplo, 30 minutos
			 */

			echo 'Senha Errada! Tentativas: ' . $_SESSION['login_tentativas'];
		}
	}

	echo "<hr>";
}


?>

<form method="POST">
	Email:
	<input type="email" name="email"><br><br>

	Senha:
	<input type="password" name="senha"><br><br>

	<input type="submit" value='Enviar'>

</form>