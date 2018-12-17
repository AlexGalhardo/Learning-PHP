<?php
class Core {

	public function run() {

		$url = '/';
		if(isset($_GET['url'])) {
			$url .= $_GET['url'];
		}

		// echo $url;exit; --> /HOME/INDEX

		/**
		 * Construção do router aqui
		 *
		 * EXEMPLO:
		 * 
		 * galhardoo.com/home/noticias/ola-mundo
		 * galhardo.com/ola-mundo
		 */
		$url = $this->checkRoutes($url);

		$params = array();

		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController';
			$currentAction = 'index';
		}

		$c = new $currentController();

		call_user_func_array(array($c, $currentAction), $params);
		
	}

	public function checkRoutes($url) {
		// pego a variavel $routes definido no arquivo routers.php
		global $routes;

		// da um loop em cada rota
		foreach($routes as $pt => $newurl) {

			// Identifica os argumentos e substitui por regex
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

			// echo $pattern;exit;
			// echo "PADRAO: " .$pattern."<br>";
			// echo "URL: " . $url;
			exit;

			// Faz o match da URL
			if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
				array_shift($matches);
				array_shift($matches);

				// print_r($matches);exit;

				// Pega todos os argumentos para associar
				$itens = array();
				if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
					// print_r($m);exit;
					$itens = preg_replace('(\{|\})', '', $m[0]);
				}
				// print_r($itens);

				// Faz a associação
				$arg = array();
				foreach($matches as $key => $match) {
					$arg[$itens[$key]] = $match;
				}

				// Monta a nova url
				foreach($arg as $argkey => $argvalue) {
					$newurl = str_replace(':'.$argkey, $argvalue, $newurl);
				}

				// echo "URL: " . $newurl;

				$url = $newurl;
				
				break;
			}
		}

		return $url;
	}
}
