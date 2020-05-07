<?php
try {
	$pdo = new PDO("mysql:dbname=mp_notificacao;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1'";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	foreach($sql->fetchAll() as $item) {

		$propriedades = json_decode($item['propriedades']);
		print_r($propriedades);

		if($item['notificacao_tipo'] == 'MSG') {
			echo $propriedades->msg."<br/>";
		}
		else if($item['notificacao_tipo'] == 'CURTIDA') {
			echo $propriedades->curtidor." curtiu a foto ".$propriedades->id_foto."<br/>";
		}
		echo "<hr/>";
	}
}