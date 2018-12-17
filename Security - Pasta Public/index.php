<?php
/**
 * Método útilizado para acessar arquivos e pastas fora da pasta public!
 */

require '../app/config.php';
require '../app/classes/Carro.php';

echo "Meu carro é: " . $carroTesla;

$carro = new Carro();
$carro->andar();

?>