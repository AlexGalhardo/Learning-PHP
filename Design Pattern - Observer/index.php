<?php

require 'classes.php';

$olheiro = new UsuarioObserver();

$usuario = new Usuario("Galhardo");
$usuario->attach($olheiro);

echo "MEU NOME É: " . $usuario->getName();
echo "<hr>";

$usuario->setName("Fulano");

echo "MEU NOME É: " . $usuario->getName();
echo "<hr>";

// $usuario->detach($olheiro);

$usuario->setName("Cicrano");

echo "MEU NOME É: " . $usuario->getName();
echo "<hr>";
