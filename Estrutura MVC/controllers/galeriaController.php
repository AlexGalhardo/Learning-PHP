<?php

class galeriaController extends controller {

	public function index(){
		//echo "Página de galeria";
		$dados = array(
			"qtd" => 10
		);

		$this->loadTemplate('galeria', $dados);
		//$this->loadView('galeria', $dados);
	}

	public function abrir($id){
		echo "Abrindo galeria: " . $id;
	}

}