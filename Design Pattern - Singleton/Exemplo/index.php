<?php

/**
 * Singleton parte do princípio que só deve ter uma instancia de uma classe em todo o sistema!
 */

class Pessoa {

	private $nome;
	private $idade;

	public static function getInstance(){

		static $instance = null;
		if($instance === null){

			$instance = new Pessoa();
		}

		return $instance;
	}

	// o método constructor é privado para que nenhuma outra instancia desta classe seja criado!
	private function __construct(){

	}

	public function setNome($n){
		$this->nome = $n;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setIdade($idade){
		$this->idade = $idade;
	}

	public function getIdade(){
		return $this->idade;
	}
}

// vou rodar diretamente um método público desta classe
$cara = Pessoa::getInstance();
$cara->setNome("Galhardo");

echo "Nome: " . $cara->getNome();

$cara2 = new Pessoa(); // vai dar erro

// se eu fizer deste modo, a instancia antiga, $cara, vai deixar de existir no sistema
// assim, apenas a instancia $novaInstancia vai existir no sistema agora!
$novaInstancia = Pessoa::getInstance();

?>