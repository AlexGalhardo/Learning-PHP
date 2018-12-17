<?php

/**
 * É muito útil esse design pattern
 *
 * quando nós não temos acesso direto a classe principal, 
 * e com isso, conseguimos adicionar novas funcionalidades a esta classe
 */
class Pessoa {

	private $nome;
	private $idade;

	public function __construct($nome, $idade){
		$this->nome = $nome;
		$this->idade = $idade;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getIdade(){
		return $this->idade;
	}
}

class PessoaAdapter {

	private $sexo;
	private $pessoa;

	public function __construct(Pessoa $pessoa){

		$this->pessoa = $pessoa;
	}

	public function setSexo($s){
		$this->sexo = $s;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function getNome(){
		return $this->pessoa->getNome();
	}

	public function getIdade(){
		return $this->pessoa->getIdade();
	}
}

$pessoa = new Pessoa("Alex", 21);
// $pessoa->setNome("Alex");
// $pessoa->setIdade(90);

$pa = new PessoaAdapter($pessoa);
$pa->setSexo("masculino");

echo "Nome: " . $pa->getNome();
echo "Idade: " . $pa->getIdade();
echo "Sexo: " . $pa->getSexo();

?>