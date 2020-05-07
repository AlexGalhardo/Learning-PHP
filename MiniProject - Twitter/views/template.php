<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Meu site</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<!--<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>-->
	</head>

	<body>
		<div class="topo">
			<div>
				<div class="topoleft">Twitter</div>
				<div class="toporight"><?php echo $viewData['nome']; ?><a href=""></a>
				<div></div>
			</div>
		</div>
		<div class="container">
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</div>
	</body>
</html>