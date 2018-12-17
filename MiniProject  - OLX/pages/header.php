<?php require 'config.php'; ?>

<!DOCTYPE html>

<html lang="pt-br">
	
	<head>
		<title></title>
		<meta charset=utf-8>
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script src="assets/js/script.js"></script>
	</head>

	<body>

		<nav class="navbar navbar-inverse">
		    <div class="container-fluid">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Galhardo OLX - Alpha</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<?php if(!isset($_SESSION['cLogin']) && empty($_SESSION['cLogin'])):?>
					<li><a href="cadastre-se.php">Cadastre-se</a></li>
					<li><a href="login.php">Login</a></li>
					<?php else: ?>
					<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
					<li><a href="sair.php">Sair</a></li>
					<?php endif; ?>
				</ul>
		    </div>
		</nav>