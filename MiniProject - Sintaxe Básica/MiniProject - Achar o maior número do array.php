<?php
$array = array(1,2,1,10,8,4,6);
echo '$array = array(1,2,1,10,8,4,6);<br/>';
echo implode(", ", $array)."<br/>";

$maior = 0;
foreach($array as $n) {
	if($n > $maior) {
		$maior = $n;
	}
}

echo "MAIOR: ".$maior;