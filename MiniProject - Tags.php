<?php
/**
 * Conexão Banco de Dados
 */
try {
	$pdo = new PDO("mysql:dbname=projeto_tags;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

/**
 * Faça uma query no banco de dados, pegando todos os dados de caracteristicas da tabela usuarios
 */
$sql = "SELECT caracteristicas FROM usuarios";
/**
 * Mande a query para o banco de dados
 */
$sql = $pdo->query($sql);
/**
 * Se tiver dados, ou seja, tiver mais de uma linha
 */
if($sql->rowCount() > 0) {
	/**
	 * Transforme a váriavel $lista em um array com os dados da query
	 */
	$lista = $sql->fetchAll();
	print_r($lista);

	/**
	 * Define $carac como um array()
	 */
	$carac = array();

	/**
	 * Para cada dado dentro de lista, defina usuário
	 */
	foreach($lista as $usuario) {
		/**
		 * 
		 * @var [type]
		 */
		$palavras = explode(",", $usuario['caracteristicas']);
		print_r($palavras);

		foreach($palavras as $palavra) {
			$palavra = trim($palavra);
			print_r($palavra);

			if(isset($carac[$palavra])) {
				$carac[$palavra]++;
			} else {
				$carac[$palavra] = 1;
			}
		}
	}

	arsort($carac);

	$palavras = array_keys($carac);
	$contagens = array_values($carac);

	$maior = max($contagens);

	$tamanhos = array(11, 15, 20, 30);

	for($x=0;$x<count($palavras);$x++) {

		$n = $contagens[$x] / $maior;

		$h = ceil($n * count($tamanhos));

		echo "<p style='font-size:".$tamanhos[$h-1]."px'>".$palavras[$x]." (".$contagens[$x].")</p>";
	}
}
