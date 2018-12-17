<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>MVC</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css?3" type="text/css" />
	</head>
	<body>
		<?php
        $this->loadViewInTemplate($viewName, $viewData);
        ?>
		<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js?v2"></script>
	</body>
</html>