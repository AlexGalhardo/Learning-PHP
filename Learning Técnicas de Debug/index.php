<?php

require 'carro.php';

$carro = new Carro();
// $carro->setCor('branco');
// $carro->setCorTipo('perolizado');

echo $carro->getCorCompleta();