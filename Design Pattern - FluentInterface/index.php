<?php

/**
 * Escrever a classe humanamente entendivel
 */

class Person {

	private $name;
	private $lastName;
	private $age;

	public function setName($n){
		$this->name = $n;
	}

	public function setLastName($n){
		$this->lastname = $n;
		return $this;
	}

	public function setAge($n){
		$this->age = $n;
	}

	public function getFullName(){
		return $this->name . ' ' . $this->lastName . ' e a idade é ' . $this->age . ' years';
	}
}

$person = new Person();
$person->setName('Alex')->setLastName('Galhardo')->setAge(21);

echo "Nome: " . $person->getFullName();