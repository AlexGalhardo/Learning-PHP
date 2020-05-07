<?php

class Carga {

	private $peso;

	public function __construct($p){
		$this->peso = $p;
	}

	public function getPeso(){
		return $this->peso;
	}
}

class Moto {

	private $sucessor;
	
	public function setSucessor($s){
		$this->sucessor = $s;
	}

	public function transport(Carga $carga){
		if($carga->getPeso() <= 5000){
			echo "LEVOU DE MOTO";
		} else {
			$this->sucessor->transport($carga);
		}
	}
}

class Carro {

	private $sucessor;
	
	public function setSucessor($s){
		$this->sucessor = $s;
	}

	public function transport(Carga $carga){
		if($carga->getPeso() <= 5000){
			echo "LEVOU DE CARRO";
		} else {
			$this->sucessor->transport($carga);
		}
	}
}

class Caminhao {

	private $sucessor;

	public function setSucessor($s){
		$this->sucessor = $s;
	}

	public function transport(Carga $carga){
		if($carga->getPeso() <= 5000){
			echo "LEVOU DE CAMINHAO";
		} else {
			$this->sucessor->transport($carga);
		}
	}
}