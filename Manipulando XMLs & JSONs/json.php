<?php

$json = file_get_contents("https://www.correiodoestado.com.br/climatempo/json/");

// pega o json puro
// print_r($json);
// exit;

// transforma texto puro vindo no $json em um json manipulável, um array de objetos em php
$json = json_decode($json);
// print_r($json);

// adicionar mais 1 cidade no JSON
$obj = new StdClass(); // criação de objeto em branco
$obj->codigo = 111;
$obj->cidade = "São Paulo";
$obj->uf = "SP";
$obj->baixa = 01;
$obj->alta = 02;
$obj->ico = 2;
$obj->frase = "Alguma coisa";
$obj->data = "...";
$obj->dia_mes = "Janeiro";
$obj->dia_semana = "Alguma";
$obj->selecionada = 1;

$json->previsao[] = $obj;

// transforma o array de objetos PHP
// para o formato original do JSON
// echo json_encode($json);
// exit;


/**
 * Printar o array de objetos PHP decodificado do JSON vindo da url
 */

/*
echo "Cidades retornadas: " . count($json->previsao) . "<br>";

foreach($json->previsao as $item){
	echo "Cidade: " . $item->cidade . " -  Baixa: ".$item->baixa." Alta: ".$item->alta." (".$item->frase.")<br>";
}
*/

$json = array(
	"nome" => "Alex",
	"idade" => 21,
	"sobrenome" => "Lacerda",
	"site" => "galhardoo.com"
);	

print_r($json); // -> VAI PRINTAR O ARRAY PHP

echo json_encode($json); // VAI TRANSFORMAR O ARRAY PHP EM FORMATO JSON ORIGINAL!

?>