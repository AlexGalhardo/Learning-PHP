<?php
require 'header.php';
echo "<br>";

/**
 * Esse método ajuda, mas não resolve o problema!
 
if(!empty($_GET['p'])){

	$pagina = $_GET['p'];

	if(file_exists('paginas/'.$pagina. '.php')){
		require 'paginas/' . $_GET['p'] . '.php';
	} else {
		require 'paginas/home.php';
	}
} else {
	require 'paginas/home.php';
}

echo "<br>";

*/

$p = 'home';
if(!empty($_GET['p'])){
    $pagina = $_GET['p'];
    /**
     * false significa que ele não achou ponto
     */
	if(strpos($pagina, '.') === false){
		if(file_exists('paginas/'.$pagina.'.php')){
			$p = $pagina;
		}
	}
}

require 'paginas/'. $p . '.php';

require 'footer.php';

// php.ini
// allow_url_fopen -> COLOCAR OFF
// allow_url_include -> COLOCAR OFF

