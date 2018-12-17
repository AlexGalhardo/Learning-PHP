<?php
require 'jwt.php';
$jwt = new JWT();

if(!empty($_GET['jwt'])) {
	$token = $_GET['jwt'];

	$info = $jwt->validate($token);

	if($info) {
		echo "Meu nome: ".$info->nome." - ".$info->id_user;
	} else {
		echo "Token Inválido!";
	}

} else {
	echo "Token não enviado!";
}