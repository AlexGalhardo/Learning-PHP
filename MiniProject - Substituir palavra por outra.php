<h1>Substituidor</h1>

<form method="POST">
	Frase:<br/>
	<input type="text" name="frase" /><br/>
	Procurar por:<br/>
	<input type="text" name="p1" /><br/>
	Trocar por:<br/>
	<input type="text" name="p2" /><br/>

	<input type="submit" value="Enviar" />
</form>

<?php
if(!empty($_POST['frase'])) {
	$frase = $_POST['frase'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];

	$novafrase = str_replace($p1, $p2, $frase);

	echo "Frase: ".$frase."<br/>";
	echo "Nova Frase: ".$novafrase;
}