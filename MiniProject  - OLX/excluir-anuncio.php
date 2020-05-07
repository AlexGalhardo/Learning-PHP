<?php

require 'config.php';

if(empty($_SESSION['cLogin'])){
	header("Location: login.php");
	exit;
}

require 'classes/anuncios.class.php';

$anuncios = new Anuncios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$anuncios->excluirAnuncio($_GET['id']);
}

header("Location: meus-anuncios.php");
?>