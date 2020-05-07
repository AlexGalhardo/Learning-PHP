<?php

class Template {

	private $html;

	public function __construct($file){
		if(file_exists($file)){
			$this->html = file_get_contents($file);
		}
	}

	public function render($array){

		foreach($array as $chave => $valor){
			$this->html = str_replace('{' . $chave . '}', $valor, $this->html);
		}
		echo $this->html;
	}
}

?>