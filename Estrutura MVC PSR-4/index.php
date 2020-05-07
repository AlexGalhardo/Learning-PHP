<?php
session_start();

/**
 * para instalar as dependências do composer.json
 * $ composer install
 *
 * se eu fizer alguma alteração,
 * preciso dar $ composer update
 */

require 'config.php';
/**
 * preciso importar o vendor/autoload
 * para fazer o autoload das classes
 */
require 'vendor/autoload.php';

/**
 * quando eu uso namespace nas classes
 * eu preciso definir o pacote delas quando eu as instancio
 */
$core = new Core\Core();
$core->run();