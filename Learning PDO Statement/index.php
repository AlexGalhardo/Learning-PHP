<?php
require 'usuarios.php';

$u = new Usuarios();
$res = $u->selecionar(1);
$atualizado = $u->atualizar("Galhardo", "galhardo@gmail.com", "123456", 4);
$u->deletar(3);
$u->deletar(2);
print_r($res); // retorna um array com os dados da linha selecionada do banco