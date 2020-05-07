<?php
require 'config.php';

if(!empty($_GET['id'])) {
	$id = intval($_GET['id']);

	$sql = "UPDATE usuarios SET status = '0' WHERE id = :id";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":id", $id);
	$sql->execute();
}

header("Location: index.php");
exit;