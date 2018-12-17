<?php

require 'config.php';

$id = $_GET['id'];

if(!empty($id)){
	$pdo->query("UPDATE usuarios SET status = '1' WHERE MD5(id) = '$id'");
	echo '<h2>Cadastro confirmado com sucesso!';
}
?>