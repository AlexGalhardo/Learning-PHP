<?php

/*
Introdução
Olá, Neste breve artigo, selecionei algumas dicas referente a documentação de códigos voltado para a linguagem PHP. O mais interessante que gostaria de destacar aqui é o PHPDoc. Nomeado como PSR-5: PHPDoc, PSR que ainda consta com o status Draft durante a escrita deste artigo, criada para ajudar na padronização de documentação de códigos PHP (Veja abaixo sobre DocBlocks). Além disso, selecionei algumas dicas genéricas a respeito de documentação de código, que podem ser aproveitadas em qualquer linguagem de programação (Veja abaixo sobre Dicas de Documentação).

DocBlocks
“DockBlocks”, assim como é referenciada na PSR-5, é uma seção (bloco) de comentário que provê informações sobre os aspectos de um determinado bloco de código na linha subsequente.
O que deve conter um “DocBlock” basicamente: Descrição ou Propósito do código, argumentos, valores de retorno, disparo de Exceptions, entre outros dependendo do contexto. Veja abaixo um exemplo básico de DocBlock:
*/

/**
 * This is a Summary.
 *
 * This is a Description. It may span multiple lines
 * or contain 'code' examples using the _Markdown_ markup
 * language.
 *
 * @see Markdown
 *
 * @param int        $parameter1 A parameter description.
 * @param \Exception $e          Another parameter description.
 *
 * @\Doctrine\Orm\Mapper\Entity()
 *
 * @return string
 */
function test($parameter1, $e)
{
    ...
}

/*
Muitas já perceberam a semelhança com o phpDocumentor, não ?. Sim, A PSR-5 é derivado do padrão do phpDocumentor 1.x, com a intenção de prover suporte para novas funções do PHP e para corrigir deficiências do seu antecessor.

De acordo com a definição da PSR, a coleção de construtores abaixo, chamados de “Structural Element”, DEVEM ser precedidos por um DocBlock:

file
require(_once)
include(_once)
class
interface
trait
function (including methods)
property
constant
variables, both local and global scope
Na PSR você encontrará muitas outras sugestões, o que DEVE, o que NÂO DEVE ser documentado, entre outras tips. Quais as tags possíveis, etc. O Objetivo é tornar comum um,padrão de documentação entre os projetos, facilitando a leitura do seu código entre os demais desenvolvedores. Elevando dessa forma a qualidade dos projetos escritos em PHP.

Dicas de documetanção
Segue abaixo algumas outras dicas de documentação de códigos que acho válido levar em consideração.

Não comente fatos óbvios que podem ser facilmente entendidos apenas verificando o próprio código.
Registre pensamentos importantes que teve durante a programação do código. Acredite, é fácil esquecê-los em pouco tempo.
Coloque-se na posição de um programador que esteja vendo seu código pela primeira vez. Que tipo de informação seria importante documentar para que o código se torne mais legível ?
Procure utilizar palavras que carreguem o máximo de significado afim de tornarem seus comentários mais breves.
Use comentários embutidos tornando as chamadas de função/métodos mais legíveis. Ajuda muito principalmente em métodos que recebem vários parâmetros. Exemplo:
*/

$con = connect($ip, $porta, /* use_crypt = */ true);

/*
Alerte sobre possíveis problemas e necessidade de futuras implementações em seu código usando comentários com nomenclaturas como TODO: ou FIXME:
*/

/*
Hoje vamos falar um pouco sobre documentação de códigos php usando a ferramenta PHPDoc ou PHPDocumentor. O PHPDoc foi baseado no JAVADoc da Sun e tem como objetivo padronizar a documentação de códigos PHP. Ele lê o código e analisa gramaticalmente procurando por tags especiais. A partir delas extrai toda documentação usando diferentes formatos (pdf, xml, html, chm Windows help e outros). Todas as tags especiais são escritas dentro do comentários do php /*comentários */ e necessariamente começam com o @ (arroba).

Descrição de algumas tags especiais:

@access Específica o tipo de acesso(public, protected e private).
@author Específica o autor do código/classe/função.
@copyright Específica os direitos autorais.
@deprecated Específica elementos que não devem ser usados.
@exemple Definir arquivo de exemplo, $path/to/example.php
@ignore Igonarar código
@internal Documenta função interna do código
@link link do código http://www.exemplo.com
@see
@since
@tutorial
@name Específica o apelido(alias).
@package Específica o nome do pacote pai, isto ajuda na organização das classes.
@param Específica os paramêtros muito usado em funções.
@return Específica o tipo de retorno muito usado em funções.
@subpackage Específica o nome do pacote filho.
@version Específica a versão da classe/função.

// Exemplo parte de código documentado com PHPDoc.

/** 
 * Comentário de cabeçalho de arquivos
* Esta classe de upload de fotos
*
* @author leo genilhu <leo@genilhu.com>
* @version 0.1 
* @copyright  GPL © 2006, genilhu ltda. 
* @access public  
* @package Infra_Estrutura 
* @subpackage UploadGenilhu
* @example Classe uploadGenilhu. 
*/ 

class uploadGenilhu {
  /** 
    * Comentário de variáveis
    * Variável recebe o diretório para gravar as fotos. 
    * @access private 
    * @name $diretorio 
    */ 
    var $diretorio = "" ;

  /** 
    * Função para  gravar imagem em diretório
    * @access public 
    * @param String $imagem_nome
    * @param String $diretorio
    * @return void 
    */ 
   function upload_up($imagem_nome, $diretorio)
    {
        $tmp = move_uploaded_file($this->arquivo["tmp_name"], $diretorio);
        return($tmp);
    } 
?>

/*
Como instalar o PHPDoc?

Há dois metódos oficiais para a instalação do PHPDocumentor, você pode baixar o PHPDoc direto do site sourceforge.net. Para instalar pasta descompactar o arquivo .zip e criar um diretorio de trabalho phpdoc.

Outra forma é usar a versão distribuída no pacote PEAR. Para instalar basta executar o comando abaixo
$ pear install PhpDocumentor

Read more: http://www.linhadecodigo.com.br/artigo/1089/phpdoc-documentando-bem-seu-codigo.aspx#ixzz5E03VbXjx
*/


/**
 * PZP
 */

/**
 * Classe para teste
 *
 * Esta classe vai pegar um valor x e somar com um valor y
 *
 * @package ControleDeEstoque
 * @author  Galhardo <aleexgvieira@gmail.com>
 * @param  $x inteiro é o primeiro valor a ser somado 
 * @param  $y inteiro é o segundo valor a ser somado
 * @return inteiro
 */
class Teste {

    private $nome;

    public function somar($x, $y){
        return $x + $y;
    }
}