<?php 

class controller {

	public function loadView($viewName, $viewData = array()){

		// essa função transforma a chave do array em uma váriavel de mesmo nome, onde seu valor vai ser o valor da chave
		extract($viewData);

		require 'views/' . $viewName. '.php';
	}

	public function loadTemplate($viewName, $viewData = array()){

		require 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()){

		extract($viewData);
		require 'views/'.$viewName. '.php';
	}
}