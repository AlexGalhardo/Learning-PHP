<?php

interface APIDesenho {
	public function desenharCirculo($x, $y, $radius);
}

class APIDesenho1 implements APIDesenho {
	public function desenharCirculo($x, $y, $radius){
		echo "Desenhando Circulo, v1: " . $x . '- ' . $y . '-' . $radius;
	}
}

class APIDesenho2 implements APIDesenho {
	public function desenharCirculo($x, $y, $radius){
		echo "Desenhando Circulo, v2: " . $x . '- ' . $y . '-' . $radius;
	}
}

abstract class Forma {

	protected $api;
	protected $x;
	protected $y;
	public function __construct(APIDesenho $api){
		$this->api = $api;
	}
}

class Circulo extends Forma {
	protected $radio;
	public function __construct($x, $y, $radius, APIDesenho $api){
		parent::__construct($api);
		$this->x = $x;
		$this->y = $y;
		$this->radio = $radius;
	}
	public function desenhar(){
		$this->api->desenharCirculo($this->x, $this->y, $this->radio);
	}
}

/**
 * Crio uma ponte na minha classe normal, mandando uma classe para a classe abstract pai desta classe normal
 * deste modo, consigo desacoplar a classe abstract
 */
$circulo = new Circulo(1, 3, 7, new APIDesenho1());
$circulo->desenhar();