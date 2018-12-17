<?php
try {
	$pdo = new PDO("mysql:dbname=mp_sistema_rating;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

if(!empty($_GET['id']) && !empty($_GET['voto'])) {
	// verifica se os dados vindo do post são inteiros
	$id = intval($_GET['id']);
	$voto = intval($_GET['voto']);

	// verifica se dado é entre 1 e 5
	if($voto >= 1 && $voto <= 5) {

		// insere voto na tabela de votos
		$sql = $pdo->prepare("INSERT INTO votos SET id_filme = :id_filme, nota = :nota");
		$sql->bindValue(":id_filme", $id);
		$sql->bindValue(":nota", $voto);
		$sql->execute();

		// faça a soma dos votos de acordo com o id_filme e divide pelo total de votos
		$sql = "UPDATE filmes SET media = (select (SUM(nota)/COUNT(*)) from votos where votos.id_filme = filmes.id) WHERE id = :id";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		header("Location: index.php");
		exit;
	}
}