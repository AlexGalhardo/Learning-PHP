<?php

class Calculadora {

	private $valor;

	/**
	 * Metodo construtor
	 */
	public function __construct($numeroInicial){
		$this->valor = $numeroInicial;
	}

	public function somar($numero){
		$this->valor += $numero;
		/**
		 * Retorna o próprio objeto
		 */
		return $this;
	}

	public function subtrair($numero){
		$this->valor -= $numero;
		return $this;
	}

	public function multiplicar($n1){
		$this->valor *= $n1;
		return $this;
	}

	public function dividir($n1){
		$this->valor /= $n1;
		return $this;
	}

	public function resultado(){
		return $this->valor;
	}
}

$calc = new Calculadora(10);
$calc->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);

$resultado = $calc->resultado(); //22.5

echo "O resultado é: " . $resultado;

?>