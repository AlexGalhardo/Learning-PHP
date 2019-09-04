<h1>Inverter String</h1>

<form method="POST">
	Palavra/Frase:<br/>
	<input type="text" name="p" /><br/>
	<input type="submit" value="Enviar"/>
</form>


<?php
if(!empty($_POST['p'])) {

	$p = $_POST['p'];
	$array = array();

	for($q=strlen($p)-1;$q>=0;$q--) {
		$array[] = $p[$q];
	}

	echo $p."<br/>";
	echo implode('', $array);

}