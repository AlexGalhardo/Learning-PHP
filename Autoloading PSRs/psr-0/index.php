<?php
// PSR-0
spl_autoload_register(function ($class){

	$file = 'classes/'.$class.'.php';
	if(file_exists($file)){
		require($file);
	}
});

$alex = new Pessoa;
echo "IDADE: " .$alex->getIdade();
$paulo = new Paulo;
echo "Paulo criado: " . $paulo->getPaulo();