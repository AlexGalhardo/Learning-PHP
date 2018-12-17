<?php
/**
 * Vai receber os dados enviados pelo arquivo usando-multiplos-arquivos-php.php
 */

if(isset($_POST) && !empty($_POST)){

	if(isset($_POST['senha']) && isset($_POST['email'])){
		echo "O usuário enviou os dados";
		echo "<br><br>Os dados enviados foram: email: " .$_POST["email"] . "e senha: " . $_POST["senha"];
	}
}


?>