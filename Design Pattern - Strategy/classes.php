<?php

interface OutputInterface {
	public function load($array);
}

class JSONOutput implements OutputInterface {
	public function load($array){
		// transforma array php em json original
		return json_encode($array);
	}
}

class ArrayOutput implements OutputInterface {
	public function load($array) {
		return $array;
	}
}

class Produtos {

	private $array;
	private $output;

	public function getLista(){
		$this->array = array(
			array(
				'nome' => 'Galhardo',
				'id' => 1
			), 
			array(
				'nome' => 'xande',
				'id' => 2
			)
		);
	}

	public function setOutput(OutputInterface $outputType){
		$this->output = $outputType;
	}

	public function getOutput(){
		return $this->output->load($this->array);
	}
}