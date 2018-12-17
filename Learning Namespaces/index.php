<?php

require_once("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();

$cad->setNome("Alex Galhardo");
$cad->setEmail("aleexgvieira@gmail.com");
$cad->setSenha("123456");

$cad->registrarVenda();

?>