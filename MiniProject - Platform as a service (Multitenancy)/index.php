<?php

// projeto1.pc -> CLIENTE 1
// projeto2.pc -> CLIENTE 2


// $ cd /opt/lampp/apache2/conf

/**
<VirtualHost *:80>
	ServerAdmin webmaster@projeto1.pc
	DocumentRoot "/opt/lampp/htdocs/Learning-PHP7/Platform as a service (Multitenancy)"
	ServerName projeto1.pc
	ServerAlias projeto1.pc
	ErrorLog "logs/projeto1.pc-error_log"
	CustomLog "logs/projeto1.pc-access_log" common
</VirtualHost>

<VirtualHost *:80>
	ServerAdmin webmaster@projeto2.pc
	DocumentRoot "/opt/lampp/htdocs/Learning-PHP7/Platform as a service (Multitenancy)"
	ServerName projeto2.pc
	ServerAlias projeto2.pc
	ErrorLog "logs/projeto2.pc-error_log"
	CustomLog "logs/projeto2.pc-access_log" common
</VirtualHost>

$ sudo nano /etc/hosts
127.0.0.1   projeto1.pc
127.0.0.1   projeto2.pc

 */

// teste
// echo "Sistema Multitenancy";


try {
	$pdo = new PDO("mysql:dbname=saas;host=localhost", "root", "");
} catch(PDOexception $e){
	echo "ERRO: " . $e->getMessage();
}

// print_r($_SERVER);

$dominio = $_SERVER['HTTP_HOST'];
echo "DOMINIO: " . $dominio;

// $sql = "SELECT * FROM usuarios WHERE dominio = '$dominio'";

$sql = "SELECT * FROM usuarios WHERE dominio = ?";
$sql = $pdo->prepare($sql);

$sql->execute(array($dominio));

if($sql->rowCount() > 0){

	$cliente = $sql->fetch();

	// print_r($cliente);

	echo "\n\nCLIENTE QUE ACESSOU: " . $cliente['nome'];

	if(file_exists('clientes/'.$cliente['id'].'/index.php')){
		require 'clientes/'.$cliente['id'].'/index.php';
	} else {
		echo "Sistema fora do ar";
	}

} else {
	echo "Sistema fora do ar.";
}