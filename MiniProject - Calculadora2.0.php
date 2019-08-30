<html>
<head>
	<meta charset="UTF-8" />
	<title>Calculadora PHP</title>
	<style>
		#div { 
			background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOEbLKMmny1xyn_TlyZmwL2cT3uZGeY-tQVizPhr00vkHDbf9A");
			background-repeat: no-repeat;
			background-size: auto;
			background-color: black;
			margin: auto;
  			width: 50%;
  			border: 1px solid red;
  			padding: 10px;
  			text-align: right;
    		}
    	.txt { color: orange; }
	</style>
</head>
<body>
	<div id="div">
	
		<form method="GET" >
			<div class="txt">Digite um número...</div>
			<input type="number" name="n1"/> </br>
			<div class="txt"> Escolha sua opcao...</div>
			<select name="op">
				<option value="-">Subtrair</option>
				<option value="+">Somar</option>
				<option value="*">Multiplicar</option>
				<option value="/">Dividir</option> 
		
			</select >
				<div class="txt">Escolha outro numero...</div>
				<input type="number" name="n2"/> </br></br>
				<input type="submit" value="SHAZAM"/>
		</form>
	</div></br></br>
<?php
if (!empty($_GET['n1']) && !empty($_GET['n2']) && !empty($_GET['op'])) {
	
	$n1 = floatval($_GET['n1']);
	$n2 = floatval($_GET['n2']);
	$op = $_GET['op'];
	switch ($op) {
		case '-':
			$conta = $n1 - $n2;
			echo "Resultado de ".$n1. " - ".$n2." = ".$conta;
			echo "  Ha Ha Acertou mizeravi...!!!";
			echo "<img src='https://media.cdnandroid.com/59/a1/83/5f/imagen-mizeravi-matematica-quiz-0big.jpg' width='40' height='40' />";
			break;
		case '+':
			$conta = $n1 + $n2;
			echo "Resultado de ".$n1. " + ".$n2." = ".$conta;
			echo " Ha Ha Acertou mizeravi...!!!";
			echo "<img src='https://media.cdnandroid.com/59/a1/83/5f/imagen-mizeravi-matematica-quiz-0big.jpg' width='40' height='40' />";
			break;
		case '*':
			$conta = $n1 * $n2;
			echo "Resultado de ".$n1. " x ".$n2." = ".$conta;
			echo " Ha Ha Acertou mizeravi...!!!";
			echo "<img src='https://media.cdnandroid.com/59/a1/83/5f/imagen-mizeravi-matematica-quiz-0big.jpg' width='40' height='40' />";
			break;
		case '/':
			$conta = $n1 / $n2;
			echo "Resultado de ".$n1. " ÷ ".$n2." = ".$conta;
			echo " Ha Ha Acertou mizeravi...!!!";
			echo "<img src='https://media.cdnandroid.com/59/a1/83/5f/imagen-mizeravi-matematica-quiz-0big.jpg' width='40' height='40' />";
			break;
			}} 
?>
</body>
</html>