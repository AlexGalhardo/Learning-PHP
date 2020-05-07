<?php

class UsuarioObserver {

	public function update(Usuario $subject){
		echo date('H:i') . "  ALERTA: USUÁRIO ALTERADO: " . $subject->getName();
		echo "<hr>";
	}
}

class Usuario {

	private $name;
	private $observers = array();

	public function __construct($name){
		$this->name = $name;
	}

	public function attach(UsuarioObserver $obs){
		$this->observers[] = $obs;
	}

	public function detach(UsuarioObserver $obs){
		foreach($this->observers as $key => $o){
			if($o == $obs){
				unset($this->observers[$key]);
			}
		}
	}

	public function notify(){
		foreach($this->observers as $o){
			$o->update($this);
		}
	}

	public function getName(){
		return $this->name;
	}

	public function setName($n){
		$this->name = $n;

		$this->notify();
	}	
}