<?php
if(!empty($_FILES['foto']['tmp_name'])){

	/**
	 * SEMPRE GERE UM NOME DE ARQUIVO VOCÊ MESMO!
	 */
	
	// verifica qual o tipo de arquivo
	// print_r($_FILES['foto']);
	// exit;
	
	/**
	 * ISSO É UMA FALHA ENORME DE SEGURANÇA!
	 * EU SEMPRE TENHO QUE CHECAR O TIPO DE ARQUIVO QUE ESTÁ SENDO ENVIADO!
	 */
	/**
	 * ESSA FORMA DE VALIDÃO NÃO É SUFICIENTE
	 * chegar apenas o tipo de arquivo pelo nome não é seguro
	 */
	$ext = explode('.', $_FILES['foto']['name']);
	$ext = end($ext);

	if($ext == 'png'){
		echo "É UMA IMAGEM!";
	} else {
		echo "NÃO É UMA IMAGEM!";
	}

	/**
	 * verifica se o type do arquivo é image/png
	 */
	if($_FILES['foto']['type'] == 'image/png'){
		echo "IMAGEM!";
	} else {
		echo "ARQUIVO!";
	}

	/**
	 * verifica se o type do arquivo é zip
	 */
	if($_FILES['foto']['type'] == 'application/zip'){
		echo "ZIP!";
	} else {
		echo "Não aceita!";
	}


	$nome = md5(rand(0, 9999).time());

	if($_FILES['foto']['type'] == 'image/png'){
		$nome = md5(rand(0, 9999).time()).'.png';
	    
	    move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $nome);

	    echo "FOTO CARREGADA COM SUCESSO!";
	}
	// move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $_FILES['foto']['name']);
}