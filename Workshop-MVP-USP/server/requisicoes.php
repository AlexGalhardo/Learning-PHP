<?php

/**
*   Roteirizador - Recebe todas as requisicoes, sanitiza e pega os inputs de GET e POST, 
*                  faz verificacoes no caso de haver arquivos e envia as informacoes 
*                  para o servico correto
**/

// Seta headers
header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

// Sanitiza os inputs externos (GET e POST)
$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// Inclui arquivo de constantes e funcoes comuns criado por nos
include_once('constantes.php');
include_once('funcoes.php');

// Cria conexao com o banco de dados
$con = new mysqli(CONST_SERVER, CONST_DB_USERNAME, CONST_DB_PASSWORD, CONST_DB_NAME);
if($con->connect_error){
  die('Unable to connect to database [' . $con->connect_error . ']');
}

// Pega as variaveis de GET, se existir alguma
if(!empty($_GET)){
  foreach ($_GET as $key => $value) {
    $$key = $value;
  }
}

// Pega as variaveis de POST, se existir alguma
if(!empty($_POST)){
  foreach ($_POST as $key => $value) {
    $$key = $value;
  }
}

// Se existir algum arquivo na requisicao
if(isset($_FILES['file'])){

  $pasta = "uploads/";
  $arquivo = $pasta . basename($_FILES["file"]["name"]);
  $tipo_de_arquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));

  // Verifica se o arquivo possui algum erro
  if($_FILES['file']['error'])
    exit(json_encode([
      'status' => 'Arquivo com erro: ' .$_FILES['file']['error']
    ]));

  // Verifica se o arquivo eh uma imagem real
  if(!getimagesize($_FILES["file"]["tmp_name"]))
    exit(json_encode([
      'status' => 'Este arquivo nao é uma imagem!'
    ]));

  // Verifica o tamanho do arquivo
  if($_FILES['file']['size'] > (300000))
    exit(json_encode([
      'status' => 'Arquivo muito grande! O limite é de 300kb.'
    ]));

  // Verifica se o arquivo possui uma extensao permitida
  if($tipo_de_arquivo != "jpg" && $tipo_de_arquivo != "png" && $tipo_de_arquivo != "jpeg" && $tipo_de_arquivo != "gif" )
    exit(json_encode([
      'status' => 'Arquivo não permitido. Use a extensão jpg, png, jpeg ou gif'
    ]));

// Se nao existir um arquivo
} else {
  $tipo_de_arquivo = '';
}

// Direciona a requisicao para o servico correto
switch ($func) {

  // Funcoes para noticias

  case 'criar_noticia':
    include_once('noticias/BD_noticias.php');
    include_once('noticias/LOG_criar_noticia.php');
    criar_noticia($titulo, $conteudo, $editoria, $tipo_de_arquivo);
    break;

  case 'listar_noticias':
    include_once('noticias/BD_noticias.php');
    include_once('noticias/LOG_listar_noticias.php');
    listar_noticias();
    break;

  case 'excluir_noticia':
    include_once('noticias/BD_noticias.php');
    include_once('noticias/LOG_excluir_noticia.php');
    excluir_noticia($id_noticia, $extensao_imagem);
    break;


  // Default (caso o servico chamado nao exista)

  default:
    echo json_encode(['status' => 'erro']);
    break;
}