<?php

/**
*   Camada logica - Cria uma nova noticia
*
*   @param  string  $titulo             Titulo da noticia
*   @param  string  $conteudo           Conteudo da noticia
*   @param  string  $editoria           Editoria na qual a noticia esta inserida
*   @param  string  $tipo_de_arquivo    Extensao do arquivo de imagem
*
*   @return json    json contendo o status (ok ou erro) da operacao
**/
function criar_noticia($titulo, $conteudo, $editoria, $tipo_de_arquivo){

  // Pega horario de Sao Paulo
  $data_hora = data_hora_saopaulo();

  // Cria uma nova noticia
  $id_noticia = BD_criar_noticia($titulo, $conteudo, $editoria, $tipo_de_arquivo, $data_hora);

  // Se a noticia for criada corretamente
  if($id_noticia){

    // Se existe algum arquivo no upload
    if(isset($_FILES['file'])){

      // Monta nome real do arquivo com base no seu nome temporario e na extensao
      $pasta = "uploads/";
      $arquivo = $pasta . basename($_FILES["file"]["name"]);
      $tipo_de_arquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
      $arquivo = $pasta . $id_noticia . '.' . $tipo_de_arquivo;

      // Move o arquivo para a pasta de uploads e verifica se esta ok
      if(!move_uploaded_file($_FILES['file']['tmp_name'], $arquivo))
        exit(json_encode(['status' => 'erro']));
    }

    echo json_encode(['status' => 'ok']);

  // Se houver problema na criacao da noticia
  } else {
    echo json_encode(['status' => 'erro']);
  }
}