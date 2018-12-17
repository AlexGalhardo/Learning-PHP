<?php

/**
 * Classe anônima é utilizada instacia ela em uma única variável
 */

// Pré PHP7

class Carro {
	public function getName(){
		return "Carro 1.0";
	}
}

$carro = new Carro();
echo $carro->getNome();

// PÓS PHP7
/**
 * Consigo criar a classe direto na variável
 */
$carro = new class {

	public function getName(){
		return "Carro PHP7";
	}
}

echo $carro->getName();


function criar_carro(){

	return new Class {
		public function getName(){
			return "Carro Criar_Carro!";
		}
	}

}

$carro = criar_carro();
echo $carro->getName();

/**
 * Injeção de dependência
 */
class Automovel {

	private $carro;

	public function setCarro($carro){
		$this->carro = $carro;
	}

	public function getName(){
		return $this->carro->getName();
	}
}

class Tesla {
	public function getName(){
		echo "Carro tesla!";
	}
}

$tesla = new Tesla();
$a = new Automovel();
$a->setCarro($tesla);
echo $a->getName();

/**
 * OU se não, posso criar a classe direto dentro do método!!!
 */

$a->setCarro(new Class{
	public function getName(){
		echo "Carro tesla!";
	}
});
echo $a->getName();

/**
 * Também posso criar a classe automóvel como classe anônima direto na variável a!!!
 */
$a = new Class {

	private $carro;

	public function setCarro($carro){
		$this->carro = $carro;
	}

	public function getName(){
		return $this->carro->getName();
	}
}

$a->setCarro(new Class{
	public function getName(){
		echo "Carro tesla!";
	}
});
echo $a->getName();

/**
 * Também posso criar o config.php
 */
$config = new Class {

	private $base = 'http://localhost';

	public function getBase(){
		return $this->base;
	}

}