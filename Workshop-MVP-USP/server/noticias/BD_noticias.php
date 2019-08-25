<?php

/**
*   Camada de acesso aos dados - CRUD para Noticias
**/


/**
*  CREATE
**/

/**
*   Cria uma nova noticia
*
*   @param  string  $titulo             Titulo da noticia
*   @param  string  $conteudo           Conteudo da noticia
*   @param  string  $editoria           Editoria na qual a noticia esta inserida
*   @param  string  $tipo_de_arquivo    Extensao do arquivo de imagem
*   @param  date    $data_hora          Data e hora da criacao da noticia
*
*   @return int     ID da insercao no banco de dados, que eh o mesmo usado para a noticia
**/
function BD_criar_noticia($titulo, $conteudo, $editoria, $tipo_de_arquivo, $data_hora){
  $sql = "INSERT INTO noticias (editoria, titulo, conteudo, extensao_imagem, data_hora) 
          VALUES ('$editoria', '$titulo', '$conteudo', '$tipo_de_arquivo', '$data_hora') ";
  $result = $GLOBALS['con']->query($sql);
  return $GLOBALS['con']->insert_id;
}

/**
*  READ
**/

/**
*   Lista todas as noticias cadastradas
*
*   @return array   Vetor com todas as propriedades de todas as noticias cadastradas 
**/
function BD_listar_noticias(){
  $sql = "SELECT * FROM noticias ";
  $result = $GLOBALS['con']->query($sql);
  $result = extrai_array($result);
  return $result;
}



/**
*  DELETE
**/

/**
*   Deleta uma noticia especifica
*
*   @param  int   $id_noticia   ID da noticia a ser deletada no banco de dados
*
*   @return int   Quantidade de linhas afetadas pela delecao
**/
function BD_excluir_noticia($id_noticia){
  $sql = "DELETE FROM noticias WHERE id_noticia='$id_noticia'";
  $result = $GLOBALS['con']->query($sql);
  return $GLOBALS['con']->affected_rows;
}