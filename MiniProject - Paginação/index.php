<?php

/**
 * 1. 0 -> 10 posts,
 * 2. 11 -> 10 posts,
 * 3. 21 -> 10 posts,
 * etc
 *
 * Quantidade de páginas: 1000 registros
 * 1000/10 por página = 100 páginas!
 */

// seleciona todos os posts
// SELECT * FROM posts;

// limite aos 10 primeiros registros
// SELECT * FROM posts LIMIT 10;

// começa do registro 10, e anda mais 10
// SELECT * FROM posts LIMIT 10, 10;


try {
	$pdo = new PDO("mysql:dbname=mp_paginacao;host=localhost", "root", "");
} catch(PDOException $e){
	echo "ERRO: " . $e->getMessage();
	die($e->getMessage());
}

/**
 * --> calcular a quantidade total de páginas
 * --> definir o $p
 * --> fazer a query com LIMIT
 */

$qt_por_pagina = 10;

$total = 0;
$sql = "SELECT COUNT(*) as c FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];
echo $total;
exit;

$paginas = $total / $qt_por_pagina;

$pg = 1;
if(isset($_GET['p']) && !empty($_GET['p'])){
	$pg = addslashes($_GET['p']);
} 

$p = ($pg - 1) * $qt_por_pagina;

// $sql = "SELECT * FROM posts";
$sql = "SELECT * FROM posts LIMIT $p, $qt_por_pagina";

$sql = $pdo->queryy($sql);

if($sql->rowCount() > 0){
	foreach($sql->fetchAll() as $item){
		echo $item['id'] . ' - ' . $item['titulo'] . '<br>';
	}
}

// echo "<br>TOTAL DE PÁGINAS: " . $paginas;

for($q=0; $q < $paginas; $q++){
	echo '<a href="./?p='.($q+1).'">[ ' . ($q+1). ']</a>';
}