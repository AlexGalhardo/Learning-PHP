/**
*   Lista noticias na tela
**/
function listar_noticias(){
  // Realiza um GET para buscar as informacoes do servidor
  $.get(host, {func: func_listar_noticias}, function(data){
    
    // Le a resposta em formato JSON
    var result = JSON && JSON.parse(data) || $.parseJSON(data);

    // Salva as noticias numa variavel local para serem acessadas quando a noticia for aberta
    for(i = 0; i < result.noticias.length; i++){
      localStorage.setItem("noticia-"+result.noticias[i].id_noticia, JSON.stringify(result.noticias[i]));
    }

    // Limpa html para receber nova lista de noticias
    $('#noticias').empty()

    // Se houver alguma noticia cadastrada, gera lista de noticias
    if(result.noticias.length > 0){

      // Cria e monta bloco de html
      var noticias = ''
      for(i = 0; i < result.noticias.length; i++){
        noticias +=
          '<div class="row" data-toggle="modal" data-target="#modalNoticia" onclick="abrir_noticia('+result.noticias[i].id_noticia+')">'+
            '<div class="col-3">'

            // Verifica se a noticia possui imagem
            if(result.noticias[i].extensao_imagem == '')
              noticias += '<img class="img-fluid" src="assets/img/sem_imagem.jpeg">'
            else
              noticias += '<img class="img-fluid" src="' + imagens + result.noticias[i].id_noticia + '.' + result.noticias[i].extensao_imagem + '" onError="this.src=' + '"../assets/img/sem_imagem.jpeg">'
            
        noticias +=
            '</div>'+
            '<div class="col-9">'+
              '<h4>'+result.noticias[i].titulo+'</h4>'+
              '<p style="color:gray">'+result.noticias[i].editoria+' ('+result.noticias[i].data_hora.substring(8,10)+'/'+result.noticias[i].data_hora.substring(5,7)+' - '+result.noticias[i].data_hora.substring(11,13)+':'+result.noticias[i].data_hora.substring(14,16)+')</p>'+
            '</div>'+
          '</div>'+
          '<hr>'
      }

      // Insere bloco de html no DOM
      $('#noticias').append(noticias)

    // Se nao houver nenhuma noticia cadastrada
    } else {
      $('#noticias').append('<br>Não há notícias cadastradas<br><br>')      
    }
  })
}

/**
*   Abre uma noticia num modal
**/
function abrir_noticia(id_noticia){

  $('#tituloModalNoticia').empty()
  $('#conteudoModalNoticia').empty()

  var noticia = JSON.parse(localStorage.getItem("noticia-"+id_noticia))
  $('#tituloModalNoticia').html(noticia.titulo)
  $('#conteudoModalNoticia').html(noticia.conteudo)
}