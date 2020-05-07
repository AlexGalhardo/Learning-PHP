<?php

/**
 * Muito útil para criar objetos que passam por várias etapas
 */

class Character {

	private $properties;
	public function setProperty($pname, $pvalue){
		$this->properties[$pname] = $pvalue;
	}

	public function getAllProperties(){
		return $this->properties;
	}
}

interface BuilderInterface {

	public function createCharacter();
	public function addHelmet();
	public function addWeapon();
	public function addBoots();
	public function getCharacter();
}

class MarioBuilder implements BuilderInterface {
	
	private $character;
	
	public function createCharacter(){
		$this->character = new Character();
	};
	public function addHelmet(){
		$this->character->setProperty('helmet', 'red');
	};
	public function addWeapon(){
		$this->character->setProperty('lefthand', 'cloves');
		$this->character->setProperty('righhand', 'cloves');
	};
	public function addBoots(){
		$this->character->setProperty('leftfoot', 'black boots');
		$this->character->setProperty('rightfoot', 'black boots');
	};
	public function getCharacter(){
		$return $this->character;
	};
}

class Director {

	public function build(BuilderInterface $builder){
		$builder->createCharacter();
		$builder->addHelmet();
		$builder->addWeapon();
		$builder->addBoots();
		return $builder->getCharacter();
	}
}

$mario = (new Director())->build(new MarioBuilder());
print_r($mario->getAllProperties());