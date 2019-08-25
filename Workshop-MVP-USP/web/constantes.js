/**
*   Arquivo com constantes
**/

/**
*   Ambiente - Comentar o que nao esta sendo usado
**/
// var ambiente = 'http://localhost/formiga/' // Dev
var ambiente = 'https://galhardo-workshop-usp-mvp.herokuapp.com/'
// var ambiente = 'https://seu.ambiente.de.producao/' // Prod


/**
*   URLs para as requisicoes
**/
var host = ambiente + 'server/requisicoes.php'
var imagens = ambiente + 'server/uploads/'


/**
*   Nomes dos servicos para noticias
**/
var func_criar_noticia = 'criar_noticia'
var func_listar_noticias = 'listar_noticias'
var func_excluir_noticia = 'excluir_noticia'