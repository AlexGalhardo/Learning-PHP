<?php

// ANTES DO PHP7
$array = array(
	'nome' => 'alex',
	'idade' => 20
);

if(isset($array['idade'])){
	$idade = $array['idade'];
} else {
	$idade = '';
}

$idade = (isset($array['idade'])) ? $array['idade'] : '';

echo "IDADE: " . $idade;

/**
 * COM PHP7
 */
$idade = $array['idade'] ?? '';