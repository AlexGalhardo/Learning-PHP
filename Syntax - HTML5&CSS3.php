<?php
/**
 * No HTML5, foi acrescentado algumas tags que ajudam os motores de busca a entenderem melhor a estrutura da página
 * ou seja, ajuda muito no SEO
 * é compativel com todos os browsers modernos
 */
?>

<!DOCTYPE html>
<html>

	<head>
		<title>HTML5 & CSS3</title>
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
		<!-- OPEN GRAPH -->
		<meta property="og:url" content="http://b7web.com.br/metashare">
		<meta property="og:type" content="article">
		<meta property="og:title" content="Titulo do nosso artigo">
		<meta property="og:description" content="descrição do artigo">
		<meta property="og:image" content="http://b7web.com.br/metashare/titulo_teste.jpg">
		WebEngines
		IE = TRIDENT
		EDGE = EdgeHTML
		Firefox = Gecko
		Opera = WebKit
		Safari = WebKit
		Chrome = WebKit
		<style>
			galhardo {
				color: red;
			}
			
			/**
			 * media query
			 */
			.teste {
				width: 900px;
				height: 500px;
				background-color: orange;
			}

			@media only screen and (max-width:700px){
				.teste {
					width: 200px;
					background-color: green;
				}
			}

			@media only screen and (min-width: 400px) and (max-width:700px){

			}
			/**
			 * quando o celular estiver deitado
			 */
			@media only screen and (orientation:landscape){
				
			}

			/**
			 * degradê
			 */
			.degrade {
				width: 900px;
				height: 500px;
				background-color: black;
				// background:linear-gradient(direção em graus, primeiracor, segundaCor);
				background:linear-gradient(-75deg, blue, red);
				background:-moz-linear-gradient(90deg, white, blue);
				background:-o-linear-gradient(45deg, white, blue);
				background:-webkit-linear-gradient(-180deg, white, blue);
			}

			/**
			 * animações
			 */
			@keyframes exemplo {
				0% {
					background-color: red;
					top: 0;
					left: 0;
				}
				25% {
					background-color: blue;
					top: 0;
					left: 200;
				}
				50% {
					background-color: black;
					top: 200;
					left: 200;
				}
				75% {
					background-color: green;
					top: 200;
					left: 0;
				}
				100% {
					background-color: yellow;
					top: 0;
					left: 0;
				}
			}

			.animacoes {
				width: 200px;
				height: 200px;
				position: absolute;
				background-color: pink;
				animation-name: exemplo;
				animation-duration: 4s;	
				animation-delay: 2s;
				animation-iteration-count: 3;
				animation-iteration-count: infinite;
			}

			/**
			 * word wrap
			 * quebrar espaçamento de div
			 */
			.word-wrap {
				word-wrap:normal; // normal
				word-wrap:break-word; // quebra a palavra para acaber na div
			}
			/**
			 * Meta tag (social sharing)
			 * 
			 * https://developers.facebook.com/tools/debug/sharing/
			 */
			
			/**
			 * transições mais suaves com css
			 */
			.quadrado {
				width: 200px;
				height: 200px;
				background-color: black;
				margin:auto;
				margin-top:100px;
				transition: all 1s linear;
				margin-bottom: 100px;
			}

			.quadrado:hover {
				width: 500px;
				background-color: red;
				// box-shadow: distanciaHorizontal distanciaVertical blur(esfumaçamento) cor;
				box-shadow: 10px 10px 5px gray;
			}

		</style>
	</head>

	<body>
		<header>
            <!-- NAVEGAÇÃO -->
			<nav></nav>
		</header>

		<div class="quadrado"></div>

		<div class="teste"></div>

		<div class="degrade"></div>

		<div class="animacoes"></div>

		<!-- separar o assunto a ser abordado 
		ajuda a separar melhor os assuntos
		-->
		<section></section>

		<!-- tem como criarmos tags nossas mesmos
			mas não é recomendado! -->
		<galhardo>Tag nova criado por min!</galhardo>

		<!-- um conteúdo principal do site 
		motor de busca, olha aqui
		esse é o conteúdo principal da página,
		busque as palavras chaves aqui dentro
		-->
		<article></article>

		<!-- o motor de busca vai interpretar
		o conteúdo aqui dentro
		como conteudo secundário
		-->
		<aside>
			<time datetime="1600-01-01">O meu dia preferido é o dia do meu aniversário.</time>
		</aside>

        <!-- apareçe o X para deletar a pesquisa -->
		<input type="search" name="search" placeholder="Pesquise alguma coisa aqui" autofocus />
		<!-- só aceita entrada com tipo email -->
		<input type="email" name="email" />

		<!-- só aceita entrada com tipo uniform resource locator -->
		<input type="url" name="url" />

		<!-- abre um teclado com números apenas! -->
		<input type="tel" name="tel" />

		<!-- só aceita números -->
		<input type="number" name="number" />

        <!-- barrinha simples de slider -->
		<input type="ranger" min="1" max="100" required/>

		<!-- date, ajuda muito para selecionar datas -->
		<input type="date" name="date"/>

		<!-- barrinha simples de slider -->
		<input type="month" name="month"/>

		<!-- barrinha simples de slider -->
		<input type="week" name="week"/>

		<!-- time -->
		<input type="time" name="time"/>

		<!-- time -->
		<input type="datetime-local" required/>

		<!-- autocomplete -->
		<input type="email" name="email" autocomplete="on" />

		<!-- Size e MaxLength -->
		<!-- size 10 == 10 caracteres na tela ~ depende da fonte -->
		<!-- maxlength define o máximo de caracteres no input -->
		<input type="" size="10" maxlength="4" required/>

		<!-- color -->
		<input type="color" required/>

		<!-- atributo data -->
		<div data-nome="AlgumNome" data-sobrenome="Galhardo">Div Data Atributo aqui</div>

		<!-- tag video -->
		<video width="320" height="240" controls>
		<video width="320" height="240" autoplay>
		<video width="320" height="240" autoplay controls>
			<source src="video.mp4" type="video/mp4" />
			<source src="video.ogg" type="video/ogg" />
		</video>

		<!-- tag audio -->
		<audio controls autoplay loop muted preload>
			<source src="audio.mp3" type="audio/mpeg" />
		</audio>

		<!-- RODAPÉ -->
		<footer></footer>

	</body>
</html>