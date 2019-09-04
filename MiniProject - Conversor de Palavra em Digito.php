<form method="POST">
	Conversor Palavra em Dígito<br/><br/>

	<input type="text" name="palavras" />
	<input type="submit" />
</form>
<hr/>
<?php
if(!empty($_POST['palavras'])) {
	$palavras = $_POST['palavras'];
	$p = explode(",", $palavras);

	$nums = array();

	foreach($p as $palavra) {
		switch($palavra) {
			case 'um':
				$nums[] = 1;
				break;
			case 'dois':
				$nums[] = 2;
				break;
			case 'três':
				$nums[] = 3;
				break;
			case 'quatro':
				$nums[] = 4;
				break;
			case 'cinco':
				$nums[] = 5;
				break;
			case 'seis':
				$nums[] = 6;
				break;
			case 'sete':
				$nums[] = 7;
				break;
			case 'oito':
				$nums[] = 8;
				break;
			case 'nove':
				$nums[] = 9;
				break;
		}
	}

	echo $palavras."<br/>";
	echo implode(",", $nums);
}