<?php
try {

	$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");

} catch(PDOException $e){
	echo "ERRO: " . $e->getMessage();
}
?>