<?php

class Post {
	private $titulo;
	private $data;
	private $corpo;
	private $comentários;

	public function __construct($t){
		$this->setTitulo($t);
	}

	public function getTitulo(){
		return $this->titulo;
	}
}


class Carro {

	private $pdo;

	public function __construct(PDO $pdo){
		$this->pdo = $pdo;
	}
}

/**
 * Só vai aceitar o formato declarado dentro da função
 */
declare(strict_types=1);

/**
 * Na versão 7 do PHP, 
 * foi adicionado atribuição a tipos das variáveis
 */
function somar(int $a,int $b){
	return $a+$b;
}
echo "SOMA: " . somar(1, 2);

/**
 * Define o retorno da função
 */
function somar(float $b, float $b):float {
	return $a*$b;
}


class Carro {

	private $pdo;

	public function __construct(PDO $pdo){
		$this->pdo = $pdo;
	}
}

/**
 * Só vai aceitar o formato declarado dentro da função
 */
declare(strict_types=1);

/**
 * Na versão 7 do PHP, 
 * foi adicionado atribuição a tipos das variáveis
 */
function somar(int $a,int $b){
	return $a+$b;
}
echo "SOMA: " . somar(1, 2);

/**
 * Define o retorno da função
 */
function somar(float $b, float $b):float {
	return $a*$b;
}


?>