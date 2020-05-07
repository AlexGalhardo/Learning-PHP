<?php
$array = array(1,2,1,6,8,4,6,9);
echo '$array = array(1,2,1,6,8,4,6,9);<br/>';

$novoarray = array();
foreach($array as $n) {
	if(in_array($n, $novoarray) == false) {
		$novoarray[] = $n;
	}
}

echo '<pre>';
print_r($novoarray);