<?php
/**
 * php.net/date
 */
$data_atual = date("d/m/Y \à\s H:i:s");

echo $data_atual;

$x = time();
echo "<br><br>" . $x;

$dataproxima = date('d/m/Y', strtotime("+10 days"));

echo "<br><br>Daqui uma semana será: " . $dataproxima;

// 01/11/2018 19:52	
date('d/m/Y H:i', strtotime($item['data_operacao']));



// input para aceitar apenas números
?>

<input type="text" name="valor" pattern="[0-9.,]{1,}" /><br/><br/>

