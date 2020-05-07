<html>
	<head>
		<title>Meu site</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
		<h1>Topo</h1>
		
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</body>
</html>