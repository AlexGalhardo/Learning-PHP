<?php

$arquivo = $_FILES['arquivo'];
print_r($arquivo); // imprimir variável em formato de array

if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){

	/**
	 * O que fazer se eu mandar outro arquivo com mesmo nome?
	 *
	 * Adicione um nome aleatório ao arquivo, para que nenhum arquivo repita o mesmo nome
	 */
	$nome_do_arquivo = md5(time().rand(0, 99)).'.png';

	/**
	 * Versão que copia o arquivo em cima do outro, se tiver o mesmo nome
	 */
	//move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);

	move_uploaded_file($arquivo['tmp_name'], 'Upload Files/uploads/'.$nome_do_arquivo);


	echo 'Arquivo enviado com sucesso!';
}

?>