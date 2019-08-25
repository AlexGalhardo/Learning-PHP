<?php

/**
*   Arquivo com funcoes auxiliares
**/

/**
*   Ajusta data para horario de Sao Paulo
*
*   @return date   Data ajustada para horario de Sao Paulo
**/
function data_hora_saopaulo() {
  date_default_timezone_set('America/Sao_Paulo');
  $date = date('Y-m-d H:i:s');
  return $date;
}

/**
*   Extrai vetor de resultados de uma query no banco de dados
*
*   @return array   Vetor com resultados de uma query no banco de dados
**/
function extrai_array($result){
  $array = array();
  while($row = $result->fetch_assoc()){
    $array[] = $row;
  }
  return $array;
}