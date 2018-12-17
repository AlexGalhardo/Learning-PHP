<?php 

class homeController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$idade = array();

		$fotos = new Fotos();

		$dados['fotos'] = $fotos->getFotos();

		$this->loadTemplate('home', $dados);
	}
}