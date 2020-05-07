<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller {

	public function index() {
		
		$array = array(
			'nome' => 'Antonio',
			'idade' => '10'
		);

		$this->returnJson($array);

	}

	public function testando() {
		echo "FUNCIONOU!";
	}

	public function visualizar_usuarios($id) {
		echo "ID: ".$id;
	}

}