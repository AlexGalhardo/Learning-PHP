<?php

/**
 * Função simples para transformar uma URL de forma mais amigável na pesquisa
 */

function SlugURL($str){
    $str = strtolower(utf8_decode($str)); $i=1;
    $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
    $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
    while($i>0) $str = str_replace('--','-',$str,$i);
    if (substr($str, -1) == '-') $str = substr($str, 0, -1);
    return $str;
}

$texto = "Sua mensagem";
echo SlugURL($texto);

// exemplo: 
// galhardoo.com/galeria/abrir/1
// galhardoo.com/galeria/abrir/2

// 1 -> precisamos de um lugar para salvar o slug no banco de dados

/**
 id   titulo         slug
 1    joao&maria     joao-e-maria
 2    alex&maria     joao-e-maria
 3    xande&maria     joao-e-maria
 4    jaum&pedro     jaum-e-pedro
 */

// 2 -> no link colocamos o slug

/**
 * <?php echo BASE_URL; >/galeria/abrir/<?php echo $album['slug']; >
 */

/**
 * 3 -> alteramos o controller para receber o slug, e não mais o ID
 */

public function abrir($slug){
	$albuns = new Albuns();

	$dados = array(
		'info' => $albuns->getAlbum($slug);
	)

	$this->loadTemplate('album', $dados);
}

/**
 * 4 -> no model, trocamos todos os ID recebidos e colocamos o slug
 */

?>