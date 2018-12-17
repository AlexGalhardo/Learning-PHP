<?php

/**
ob_start();
// tudo o que for feito entre essas duas funções, não vai ser mostrado para o usuário
// vai ser guardado na memória
require 'pagina.php';

$html = ob_get_contents();

ob_end_clean();

echo $html;
*/

/**
 * CACHE É EXTREMAMENTE ÚTIL PARA SITES DE NOTÍCIAS E BLOGS COM GRANDE PROCESSAMENTO
 */

if(file_exists('cache.cache')){
	require 'cacheIntermediario.cache';
} else {
	ob_start();
	// tudo o que for feito entre essas duas funções, não vai ser mostrado para o usuário
	// vai ser guardado na memória
	require 'pagina.php';

	$html = ob_get_contents();

	ob_end_clean();

	file_put_contents('cacheIntermediario.cache', $html);

	echo $html;
}



?>