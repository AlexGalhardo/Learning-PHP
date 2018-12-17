<?php
// PSR-4
// A diferença com a PSR-0 é que nesta psr eu uso namespace para definir as classes e os pacotes
spl_autoload_register(function($class){

	//$base_dir = __DIR__ . 'pacotes/';
	$base_dir = 'pacotes/';

	$file = $base_dir . str_replace('\\', '/', $class). '.php';

	// echo "FILE: " . $file;

	if(file_exists($file)){
		require($file);
	}

});

$clienteInfo = new pacoteExemplo\Clientes\ClienteInfo;
echo "NAME: " . $clienteInfo->getNome();
echo "<hr/>";
echo "IDADE: " . $clienteInfo->getIdade();
echo "<hr/>";
$clienteOrders = new pacoteExemplo\Clientes\ClienteOrders;
print_r($clienteOrders->getAll());

echo "<hr/>";

// Teoria
// Vendor name (pacoteExemplo)
// Subnamespaces 1+ (Clientes, Produtos...)