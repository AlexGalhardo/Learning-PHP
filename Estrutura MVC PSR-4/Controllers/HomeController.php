<?php

namespace Controllers;

/**
 * importando as classes de acordo com a classe
 */
use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller {

	public function index() {
		$array = array();

		$usuarios = new Usuarios();
		$array['lista'] = $usuarios->getAll();

		$this->loadTemplate('home', $array);
	}

}