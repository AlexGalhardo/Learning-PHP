<?php
// conexão simples com banco de dados
try {
	$pdo = new PDO("mysql:dbname=mp_autocomplete;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

// defino um array de retorno
$array = array();

// verifico se foi enviado algum dado via ajax
if(!empty($_POST['texto'])) {
	$texto = $_POST['texto'];

	// faço uma query simples no banco de dados
	// para verificar se o nome é parecido com :texto
	$sql = "SELECT * FROM pessoas WHERE nome LIKE :texto";
	// prepare a query com PDO
	$sql = $pdo->prepare($sql);
	// atribuo o valor
	// o % no inicio e no final, signifca que vai possuir a palavra texto em qualquer parte do nome
	$sql->bindValue(":texto", '%'.$texto.'%');
	$sql->execute();

	if($sql->rowCount() > 0) {

		foreach($sql->fetchAll() as $pessoa) {
			$array[] = array('nome'=>utf8_encode($pessoa['nome']), 'id'=>$pessoa['id']);
		}
	}
}

// transformo o array php em JSON
echo json_encode($array);