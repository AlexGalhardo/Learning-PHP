<?php

try {
	$pdo = new PDO("mysql:dbname=mp_usuarios_online;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: " . $e->getMessage();
	exit;
}

$ip = $_SERVER['REMOTE_ADDR'];
$hora = date('H:i:s');
// echo "ECHO: " . $ip;
$sql = $pdo->prepare("INSERT INTO acessos (ip, hora) VALUES (:ip, :hora)");
$sql->bindValue(":ip", $ip);
$sql->bindValue(":hora", $hora);
$sql->execute();

$sql = $pdo->prepare("DELETE FROM acessos WHERE hora < :hora");
$sql->bindValue(":hora", date('H:i:s', strtotime("-2 minutes")));
$sql->execute();

// $sql = "SELECT COUNT(*) as c FROM acessos WHERE hora > :hora GROUP BY ip";

$sql = "SELECT * FROM acessos WHERE hora > :hora GROUP BY ip";
$sql = $pdo->prepare($sql);
$sql->bindValue(":hora", date('H:i:s', strtotime("-5 minutes")));
$sql->execute();
$contagem = $sql->rowCount();

// $sql = $sql->fetch();

echo "ONLINE: " . $contagem;