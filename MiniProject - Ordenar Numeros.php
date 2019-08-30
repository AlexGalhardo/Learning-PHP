<h1>Ordenador de números</h1>

<form method="POST">
	Digite os números:<br/>
	<input type="text" name="nums" /><br/>
	<input type="submit" value="Enviar" />
</form>

<?php
if(!empty($_POST['nums'])) {
	$nums = $_POST['nums'];

	$novo = explode(" ", $nums);
	sort($novo);

	echo '<pre>';
	print_r($novo);
}