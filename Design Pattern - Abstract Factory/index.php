<?php

abstract class Video {

	abstract public function render();

}

abstract class AbstractFactory {
	abstract public function createPlayer($url);
}

class HtmlFactory extends AbstractFactory {
	public function createPlayer($url){
		return new htmlPlayer($url);
	}
}

class htmlPlayer extends Video {

	private $url;
	
	public function __construct($url){
		$this->url = $url;
	}

	public function render(){
		echo '<video>'.$this->url.<'</video>';
	}
}

class FlashFactory extends AbstractFactory {

	public function createPlayer($url){
		return new flashPlayer($url);
	}
}

class flashPlayer extends Video {

	private $url;
	public function __construct($url){
		$this->url = $url;
	}

	public function render(){
		echo '<object>'.$this->url.'</object>';
	}
}


$fac = new HtmlFactory();
$fac = new FlashFactory();
$player = $fac->createPlayer('123');
$player->render();