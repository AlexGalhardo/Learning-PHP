<?php

/**
*   Camada logica - Lista todas as noticias cadastradas
*
*   @return json    json contendo uma lista de todas as noticias cadastradas
**/

function listar_noticias(){

  // Pega uma lista com todas as noticias cadastradas
  $result = BD_listar_noticias();

  // Retorna json com a lista de noticias cadsatradas
  echo json_encode([
    'status' => 'ok',
    'noticias' => $result
  ]);
}