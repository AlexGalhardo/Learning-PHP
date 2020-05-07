<?php

/**
 * Método constructor com nome de mesma classe não funciona mais nas próximas versões do php
 */
class Carro {

	function Carro(){
		echo "Classe Construída";
	}

	function rodar(){
		echo "Vrum";
	}

	// certo
	public static function rodar(){
		echo "Vrum";
	}
}

$carro = new Carro();
$carro::rodar(); // -> método estático deste modo tmbm vai ser depreciado 

// recomendado usar PDO na conexão com banco de dados, porque ele é suportado na maioria dos bancos de dados
