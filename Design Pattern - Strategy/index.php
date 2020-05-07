<?php

require 'classes.php';

$produtos = new Produtos();
$produtos->getLista();

//$produtos->setOutput(new ArrayOutput());
$produtos->setOutput(new JSONOutput());

$data = $produtos->getOutput();