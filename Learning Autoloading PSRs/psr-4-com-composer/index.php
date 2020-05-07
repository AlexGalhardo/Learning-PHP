<?php
// PSR-4 com Composer

// composer -> gerenciador de dependencias

// https://getcomposer.org
// packagist.org --> repositorios do composer
// downloads -> baixar Latest Snapshot -> moder composer.phar para diretorio do projeto
// criar novo arquivo "composer.json", com o autoload e os requires desejados
// dar um "$ composer install" no terminal
// vai criar uma pastinha chamada vendor, com pasta composer e autoload.php no projeto
// se eu fizer alguma mudança nesta regra, eu preciso dar um "$ composer update" no terminal

// para atualizar dependencias do composer, é so rodar "$ composer update"

// require __DIR__ . 'vendor/autoload.php';
// esse require vai carregar todas as depedencias/bibliotecas que o composer instalou
require 'vendor/autoload.php';

$clienteInfo = new pacoteExemplo\Clientes\ClienteInfo;
echo "NAME: " . $clienteInfo->getNome();
echo "<hr/>";
echo "IDADE: " . $clienteInfo->getIdade();
echo "<hr/>";
$clienteOrders = new pacoteExemplo\Clientes\ClienteOrders;
print_r($clienteOrders->getAll());

echo "<hr/>";

// configurando Monologer como exemplo
$log = new Monolog\Logger("teste");
$log->pushHandler(new Monolog\Handler\StreamHandler('errors.log', Monolog\Logger::WARNING));

$log->addError("Aviso, deu algo errado!");

// Teoria
// Vendor name (pacoteExemplo)
// Subnamespaces 1+ (Clientes, Produtos...)