<?php

require 'config.php';

if(empty($_SESSION['cLogin'])){
	header("Location: login.php");
	exit;
}

require 'classes/anuncios.class.php';

$anuncios = new Anuncios();

if(isset($_GET['id']) && !empty($_GET['id'])) {

	$id_anuncio = $anuncios->excluirFoto($_GET['id']);
}

if(isset($id_anuncio)){
	header("Location: editar-anuncio.php?id=".$id_anuncio);
} else {
	header("Location: meus-anuncios.php");
}

?>