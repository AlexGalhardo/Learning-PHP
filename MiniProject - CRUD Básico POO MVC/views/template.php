<!DOCTYPE html>
<html>
	<head>
		<title>Crud MVC</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
		<header>
			<h1>
				Meu Sistema de contatos
			</h1>
		</header>
		<section>
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</section>
		<footer>
			Todos os direitos reservados
		</footer>
	</body>
</html>