<?php
try {
	$pdo = new PDO("mysql:dbname=mp_notificacao;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

$prop = array(
	'curtidor' => '2',
	'id_foto' => '123'
);

$sql = "INSERT INTO notificacoes (id_user, notificacao_tipo, propriedades, link) VALUES (:id_user, :tipo, :prop, :link)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id_user", "1");
$sql->bindValue(":tipo", "CURTIDA");
$sql->bindValue(":prop", json_encode($prop));
$sql->bindValue(":link", "http://seusite.com/foto/123");
$sql->execute();