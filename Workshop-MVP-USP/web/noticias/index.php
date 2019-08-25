<!doctype html>
<html lang="en">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- Para usar na web, eh recomendado buscar o arquivo no CDN indicado pelo desenvolvedor -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="noticias.css">

  <title>Notícias</title>

</head>
<body>

  <div class="container">

    <div class="row">

      <!-- Formulario para cadastro de nova noticia -->
      <div class="col-12 col-lg-5">
        <br>
        <h1>Nova notícia</h1>
        <br>
        <form>
          <div class="form-group">
            <label for="editoria">Editoria</label>
            <input type="text" class="form-control" id="editoria" placeholder="Editoria" maxlength="30">
          </div>
          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" placeholder="Título da notícia" maxlength="60">
          </div>
          <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea class="form-control" id="conteudo" placeholder="Conteúdo da notícia" rows="6" maxlength="2000"></textarea>
          </div>
          <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
          </div>
          <br>
          <button type="button" class="btn btn-primary" onclick="criar_noticia()">Criar notícia</button>
          <br>
          <br>
          <div id="resp_noticia"></div>
        </form>
      </div>

      <!-- Area para listagem das noticias cadastradas -->
      <div class="col-12 col-lg-7">
        <br>
        <h1>Notícias</h1>
        <br>
        <div id="noticias"></div>
      </div>
    </div>

  </div>

  <!-- JS necessarios para o bootstrap 4.1 (jQuery completo e nao slim) -->
  <!-- Para usar na web, eh recomendado buscar o arquivo no CDN indicado pelo desenvolvedor -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <!-- JS externo ao html -->
  <script type="text/javascript" src="../constantes.js"></script>
  <script type="text/javascript" src="noticias.js"></script>

  <!-- JS interno ao html -->
  <script type="text/javascript" charset="UTF-8">

    $(document).ready(function(){

      // Lista noticias
      listar_noticias()

      // Faz botao de excluir noticia aparecer quando o mouse esta em cima dela e sumir quando nao esta
      $(document).on('mouseenter', '.div-noticia', function () {
        $(this).find(".excluir-noticia").show()
      }).on('mouseleave', '.div-noticia', function () {
        $(this).find(".excluir-noticia").hide()
      });
    })

  </script>

</body>
</html>