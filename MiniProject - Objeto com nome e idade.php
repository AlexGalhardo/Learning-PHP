<?php

class Pessoa {

	private $nome;
	private $nasc;

	public function __construct($nome, $nasc) {
		$this->nome = $nome;
		$this->nasc = $nasc;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getIdade() {
		$data = explode("/", $this->nasc);

		$d1 = time();
		$d2 = strtotime($data[2].'-'.$data[1].'-'.$data[0]);

		$c = $d1 - $d2;

		$ano = date('Y', $c) - 1970;

		return $ano;
	}

}

// require 'Pessoa.class.php';

$pessoa = new Pessoa('Bonieky', '10/02/1929');

echo $pessoa->getNome()." tem ".$pessoa->getIdade()." anos";