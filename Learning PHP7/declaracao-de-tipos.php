<?php

/**
 * Posso declarar os tipos dos paramêtros e o retorno da função
 */

// int, float, double, bool, string
function somar(int $a, int $b):int {
	return $a + $b;
}

$n = new Numero(5);

echo "SOMA: " . somar(3, 2); // 5
echo "SOMA: " . somar("c", 2); // unchaught type error


class Numero {

	private number;
	public function __construct($number){
		$this->number = $number;
	}
}

function somar2(Numero $number, int $b):int{
	return $number + $b;
}
echo "SOMA Class: " . somar2($n, 2);


class Carro {
	private $pdo;

	// só vai receber um classe PDO no constructor
	public function __construct(PDO $pdo){
		$this->pdo = $pdo;
	}
}