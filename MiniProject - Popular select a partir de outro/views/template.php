<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>MVC</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" type="text/css" />
	</head>
	<body>
		<?php
        $this->loadViewInTemplate($viewName, $viewData);
        ?>
		<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>