<?php

session_start();

if(isset($_POST['email']) && !empty($_POST['email'])) {

	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	try {
		/**
		* Diferença entre bindValue e bindParam
		* o bindValue aceita como valor o retorno de uma função por exemplo, enquanto o bindParam só aceita variaveis já preenchidas :D 
		*/
		/**
		 * Prepare um Objeto com os dados do Banco
		 * @var PDO
		 */
		$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");
		/**
		 * Obriga o PDO a mostrar erros internos
		 */
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		/**
		 * Prepare a query para fazer no banco de dados e salve os dados em $sql
		 */
		$sql = $pdo->query("SELECT * FROM loguin WHERE email = '$email' AND senha = '$senha'");
		
		if($sql->rowCount() > 0){
			/**
			 * Pega o primeira resultao da requisição 
			 * 
			 * Transforma $dado em um array com os dados do usuário
			 */
			$dado = $sql->fetch();

			/**
			 * Crie uma SESSION com a id do usuário
			 */
			$_SESSION['id'] = $dado['id'];

			header("Location: sisteminha-de-login.php");
		}
		
	
	} catch (PDOException $e){

		echo "Erro: " . $e->getMessage();
	
	}
}

?>

<h2>Página de Login</h2>
<form method="POST">

	Email:<br><br>
	<input type="email" name="email"><br><br>

	Senha:<br><br>
	<input type="password" name="senha"><br><br>
	
	<input type="submit" value="logar"/>

</form>