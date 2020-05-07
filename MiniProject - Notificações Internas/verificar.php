<?php
try {
	$pdo = new PDO("mysql:dbname=mp_notificacao;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1' AND lido = '0'";
$sql = $pdo->query($sql);

$array = array('qt'=>0);

if($sql->rowCount() > 0) {
	$array['qt'] = $sql->rowCount();
}

// transforma o array em JSON
// o tipo do arquivo(HEADER) visto pelo browser é um JSON
echo json_encode($array);
exit;