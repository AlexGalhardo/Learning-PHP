<?php

class homeController extends controller {

	public function index(){

		$dados = array();

		$contatos = new Contatos();

		$dados['lista'] = $contatos->getAll();

		$this->loadTemplate('home', $dados);
	}
}