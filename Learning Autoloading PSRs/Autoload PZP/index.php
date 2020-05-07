<?php

/**
 * MODO ANTIGO, PROCEDURAL
 */
require 'Animal.php';
require 'Pessoa.php';

$cavalo = new Animal();
$pessoa = new Pessoa();

$pessoa->andar();
$cavalo->falar();

/**
 * MODO CARREGAMENTO AUTOMÁTICO
 *
 * toda vez que precisarmos instanciar uma classe, essa função automaticamente vai importar os arquivos necessários
 */
spl_autoload_register(function($class){

	require 'classes/'.$class.'.php';
});
