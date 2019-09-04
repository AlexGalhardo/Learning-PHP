<form method="POST">
	Calculadora de Imposto<br/><br/>

	Valor do produto:<br/>
	<input type="text" name="produto" /><br/><br/>

	Taxa de imposto (em %):<br/>
	<input type="text" name="pct" /><br/><br/>

	<input type="submit" value="Calcular" />
</form>

<?php
if(!empty($_POST['produto'])) {
	$p = floatval($_POST['produto']);
	$pct = floatval($_POST['pct']);
	$imp = (($pct/100)*$p);
	$pimp = $p - $imp;

	echo "Valor do produto: R$ ".$p."<br/>";
	echo "Taxa de imposto: ".$pct."%<br/><hr/>";
	echo "Imposto: R$ ".$imp."<br/>";
	echo "Produto: R$ ".$pimp."<br/>";
}
?>