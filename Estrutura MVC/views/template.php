<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Meu site</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>

	<body>
		<h1>Este é o topo</h1>
		<a href="<?php echo BASE_URL; ?>">Home</a>
		<a href="<?php echo BASE_URL; ?>galeria">Galeria</a>
		<hr>
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</body>
</html>