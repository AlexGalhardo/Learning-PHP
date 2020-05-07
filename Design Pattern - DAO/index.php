<?php

require 'classes.php';

// DATA ACCESS OBJECT 

/**
$usuario = new Usuario(array(
	'name' => 'Galhardo',
    'email' => 'galhardo@gmail.com',
    'senha' => md5('123'),
    'id' => '1'
));

echo "NOME: " . $usuario->getName();

*/

$usuarioDAO = new UsuarioDAO();

$usuarioDAO->insertArray(array(
	'nome' => 'Fulano',	
	'email' => 'fulano@gmail.com',
	'senha' => md5('123')
));

/**
 * também posso mandar direto um objeto, ao invés de um array
 */
$novoUsuario = new Usuario(array(
	'nome' => 'PessoaObjeto',	
	'email' => 'objeto@gmail.com',
	'senha' => md5('456')
));
$usuarioDAO->insertObject($novoUsuario);

$usuarios = $usuarioDAO->get();

foreach($usuarios as $usuario){
	echo "<br><br><br>";
	echo "ID: " . $usuario->getId() . "<br>";
	echo "NOME: " . $usuario->getName() . "<br>";
	echo "EMAIL: " . $usuario->getEmail() . "<br>";
	echo "SENHA: " . $usuario->getSenha() . "<br>";
}