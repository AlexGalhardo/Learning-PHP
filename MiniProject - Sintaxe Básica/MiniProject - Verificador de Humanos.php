<?php
session_start();
	if (isset($_POST['resultado']) && !empty($_POST['resultado'])) {
		$humano = ($_POST['resultado'] == $_SESSION['resultado']);
	}
	else {
		$primeiro = rand(1,10);
		$segundo = rand(1,10);
		$resultado = $primeiro + $segundo;
		$_SESSION['resultado'] = $resultado;
	}
?>

<html>
<body>
<h1>Verificador de Humano</h1>
<h3>
<?php if (!isset($humano))	{ ?>
	<form method="POST">	
		<?php echo $primeiro;?> + <?php echo $segundo;?> = 
		<input type="text" name="resultado"> 
		<input type="submit" value="Enviar">
	</form>
<?php } else { ?>

	<?php echo ($humano?'HUMANO':'FAKE');?>
	<BR>
	<a href="humano.php">Novo Teste</a>

<?php	} ?>	

</h3>
</h3>
</body>

</html>