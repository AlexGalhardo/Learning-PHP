<?php 

class homeController extends controller {

	public function index() {
		//echo "Olá mundo";

		$anuncios = new Anuncios();
		$usuarios = new Usuarios();

		$dados = array(
			"quantidade" => $anuncios->getQuantidade(),
			"nome" => $usuarios->getNome(),
			"idade" => $usuarios->getIdade()
		);

		$this->loadTemplate("home", $dados);
		$this->loadView("home", $dados);
	}

	public function teste(){
		echo "TESTEee";
	}

}