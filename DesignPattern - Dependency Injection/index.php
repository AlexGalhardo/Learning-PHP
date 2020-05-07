<?php

class YouTube implements VideoServiceInterface {

	private $url;

	public function __construct($url){
		$this->url = $url;
	}

	public function getEMBED(){
		return '<iframe>'.$this->url .'</iframe>';
	}
}

class Vimeo implements VideoServiceInterface {

	private $url;

	public function __construct($url){
		$this->url = $url;
	}

	public function getEMBED(){
		return '<video>'.$this->url .'</video>';
	}
}

/**
 * JEITO ANTIGO DE SE FAZER
 * NÃO USANDO DESIGN PATTERN
 *
 * EXTREMAMENTE NÃO RECOMENDADO FAZER DESTE MODO
 */
class Aula {

	private $video;

	public function __construct($vide_type, $url){
		if($video_type == 'YouTube'){
			$video = new YouTube($url);
		} else {
			$video = new Vimeo($url);
		}
	}
}


/**
 * MODO CORRETO COM INJEÇÃO DE DEPENDÊNCIA
 */
interface VideoServiceInterface {
	public function getEMBED();
}

class Aula implements VideoServiceInterface {

	private $video;

	public function __construct(VideoServiceInterface $video){
		$this->video = $video;
	}

	public function getVideoHTML(){
		return $this->video->getEMBED();
	}
}

$aula = new Aula(new Youtube('123'));
echo "HTML: " . $aula->getVideoHTML();