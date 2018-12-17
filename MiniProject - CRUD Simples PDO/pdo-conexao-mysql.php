<?php

/**
 * PDO é uma classe que se conecta a qualquer banco de dados que o php suporta
 */

/**
 * Cria uma conexão no banco de dados usando PDO
 */

$conexao = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpassword = "";

try {

	$pdo = new PDO($conexao, $dbuser, $dbpassword);	

	//$sql = "SELECT * FROM usuarios";
	//$sql = "SELECT * FROM usuarios where email = 'naoexiste@gmail.com'";
	$sql = "SELECT * FROM usuarios where email = 'alex@gmail.com'";
	$sql = $pdo->query($sql);

	/**
	 * Verifica se há dados no banco
	 */
	if($sql->rowCount() > 0){

		//echo "Há usuários sim!";
		
		/**
		 * Para cada, faça uma busca em modo string, e pegue cada dado como usuario
		 */
		foreach($sql->fetchAll() as $usuario){

			echo "<br>Nome: ". $usuario["nome"] . "<br>";
			echo "<br>Email: ".$usuario["email"] ."<br>";

		}

	} else {
		echo "Não há usuáros cadastrados!";
	}

} catch(PDOException $e){

	echo "Falhou: " . $e->getMessage();

}

?>