<?php

/**
*   Camada logica - Exclui uma certa noticia
*
*   @param  int     $id_noticia       ID da noticia a ser excluida no banco de dados
*   @param  string  $extensao_imagem  Extensao do arquivo a ser excluido na pasta de uploads
*
*   @return json    json contendo o status (ok ou erro) da operacao
**/

function excluir_noticia($id_noticia, $extensao_imagem){

  // Exclui uma noticia do banco
  $result = BD_excluir_noticia($id_noticia);

  // Se a noticia for excluida corretamente
  if($result){

    // Caso a noticia tenha uma imagem, deleta a imagem
    if($extensao_imagem != ''){
      $imagem = CONST_PASTA_IMAGENS . $id_noticia . '.' . $extensao_imagem;
      unlink($imagem);
    }

    echo json_encode(['status' => 'ok']);

  // Se houver problema na exclusao da noticia
  } else {
    echo json_encode(['status' => 'erro']);
  }
}