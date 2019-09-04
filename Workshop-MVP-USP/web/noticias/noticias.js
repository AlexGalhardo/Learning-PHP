/**
*   Lista noticias
**/
function listar_noticias(){

  // Realiza um GET para buscar as informacoes do servidor
  $.get(host, {func: func_listar_noticias}, function(data){
    
    // Le a resposta em formato JSON
    var result = JSON && JSON.parse(data) || $.parseJSON(data);

    // Limpa html para receber nova lista de noticias
    $('#noticias').empty()

    // Se houver alguma noticia cadastrada, gera lista de noticias
    if(result.noticias.length > 0){
      var noticias = ''
      for(i = 0; i < result.noticias.length; i++){
        noticias +=
          '<div class="row div-noticia">'+
            '<div class="col-3">'

            // Verifica se a noticia possui imagem
            if(result.noticias[i].extensao_imagem == '')
              noticias += '<img class="img-fluid" src="../assets/img/sem_imagem.jpeg">'
            else
              noticias += '<img class="img-fluid" src="' + imagens + result.noticias[i].id_noticia + '.' + result.noticias[i].extensao_imagem + '" onError="this.src=' + '"../assets/img/sem_imagem.jpeg">'
            
        noticias +=
            '</div>'+
            '<div class="col-9">'+
              '<button class="btn btn-danger excluir-noticia" onclick="excluir_noticia('+result.noticias[i].id_noticia+',\''+result.noticias[i].extensao_imagem+'\')">Excluir</button>'+
              '<h4>'+result.noticias[i].titulo+'</h4>'+
              '<p class="editoria_noticia">'+result.noticias[i].editoria+' ('+result.noticias[i].data_hora.substring(8,10)+'/'+result.noticias[i].data_hora.substring(5,7)+' - '+result.noticias[i].data_hora.substring(11,13)+':'+result.noticias[i].data_hora.substring(14,16)+')</p>'+
              '<p>'+result.noticias[i].conteudo+'</p>'+
            '</div>'+
          '</div>'+
          '<hr>'
      }
      $('#noticias').append(noticias)

    // Se nao houver nenhuma noticia cadastrada
    } else {
      $('#noticias').append('<br>Não há notícias cadastradas<br><br>')      
    }
  })
}


/**
*   Cria nova noticia
**/
function criar_noticia(){

  // Pega valores do formulario
  var editoria = $('#editoria').val()
  var titulo = $('#titulo').val()
  var conteudo = $('#conteudo').val()

  // Verifica se existe uma editoria
  if(editoria == ''){
    alert('Escolha uma editoria')
    return false

  // Verifica se existe um titulo
  } else if(titulo == ''){
    alert('Dê um título para a notícia')
    return false

  // Verifica se existe conteudo
  } else if(conteudo == ''){
    alert('Escreva um conteúdo para a notícia')
    return false
  }

  // Monta formulario para ser enviado (este POST eh diferente, pois pode ter um arquivo, entao precisa do FormData)
  dataform = new FormData()
  dataform.append( 'file', $( '#imagem' )[0].files[0] )
  dataform.append( 'editoria', editoria )
  dataform.append( 'titulo', titulo )
  dataform.append( 'conteudo', conteudo )
  dataform.append( 'func', func_criar_noticia )

  // Faz o POST para o servidor e envia as informacoes
  $.ajax({
    url: host,
    data: dataform,
    cache: false,
    contentType: false,
    processData: false,
    method: 'POST',

    // No caso de sucesso
    success: function(data){

      var result = JSON && JSON.parse(data) || $.parseJSON(data)

      if(result.status == 'ok'){

        // Limpa campos
        $('#editoria').val('')
        $('#titulo').val('')
        $('#conteudo').val('')
        var e = $('#imagem')
        e.wrap('<form>').closest('form').get(0).reset()
        e.unwrap()

        
        // Insere aviso temporario de status positivo
        $('#resp_noticia').empty().show().append('<span class="cor_resp_positiva">Notícia criada!</span>')
        setTimeout(function(){ $('#resp_noticia').fadeOut(800); }, 800)
        listar_noticias()

      } else {
        // Insere aviso temporario de status negativo
        $('#resp_noticia').empty().show().append('<span class="cor_resp_negativa">Ocorreu um erro!</span>')
        setTimeout(function(){ $('#resp_noticia').fadeOut(800); }, 800);
      }
    },

    // No caso de falha
    error: function(data){
      alert('Ops, ocorreu um problema no upload.')
    }
  });
}


/**
*   Exclui noticia
**/
function excluir_noticia(id_noticia, extensao_imagem){

  // Faz um POST para enviar informacoes ao servidor
  $.post(host, {func: func_excluir_noticia, id_noticia: id_noticia, extensao_imagem: extensao_imagem}, function(data){

    // Le a resposta em formato JSON
    var result = JSON && JSON.parse(data) || $.parseJSON(data);

    // Se a exclusao ocorreu com sucesso
    if(result.status == 'ok'){
      listar_noticias()

    // Se houve alguma falha na exclusao
    } else {
      alert('Não foi possível excluir a noticia!')
    }
  })
}