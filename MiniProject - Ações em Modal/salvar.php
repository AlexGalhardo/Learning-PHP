<?php

$pdo = new PDO("mysql:dbname=acoes_modal;host=localhost", "root", "");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$pdo->query("UPDATE usuarios SET nome = '$nome', email = '$email', senha =  '$senha' WHERE id = '$id'");