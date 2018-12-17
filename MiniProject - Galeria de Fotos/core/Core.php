<?php

class Core {

	public function run(){

		// echo "URL: " . $_GET['url'];
		/**
		 * galhardoo.com/projetos/crud/1
		 *
		 * 1 -> projetos (controllers/projetosController.php)
		 *
		 * 2 -> crud é um método da classe projetosController(projetrosController->())
		 *
		 * 3 -> 1 é um parâmetro do método crud (projetosController->crud(1))
		 */
		
		$url = '/';
		if(isset($_GET['url'])){
			$url .= $_GET['url'];
		}
		//echo "URL: " . $url;
		
		$params = array();

		if(!empty($url) && $url != '/'){

			$url = explode('/', $url);
			// remove o primeiro registro do array
			array_shift($url);

			//print_r($url);
			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			//print_r($url);
			if(count($url) > 0){
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		$controller = new $currentController();
		call_user_func_array(array($controller, $currentAction), $params);

		// echo "CONTROLLER: " .$currentController."<br/>";
		// echo "ACTION: " . $currentAction."<br/>";
		// echo "PARAMS: " . print_r($params, true)."<br>";

	}

}