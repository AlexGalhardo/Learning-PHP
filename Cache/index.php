<?php

/**
 * É o processo onde só pega o resultado de algo que já foi processado
 */

class Cache {

	private $cache;

	public function setVar($nome, $valor){
		$this->readCache();
		$this->cache->$nome = $valor;
		$this->saveCache();
	}

	public function getVar($nome){
		$this->readCache();
		return $this->cache->$nome;
	}

	private function readCache(){
		$this->cache = new stdClass(); // vai criar um objeto vázio
		if(file_exists('cache.cache')){
			$this->cache = json_decode(file_get_contents('cache.cache'));
		}
	}

	private function saveCache(){
		file_put_contents("cache.cache", json_encode($this->cache));
	}
}

$cache = new Cache();
$cache->setVar("nome", "Alex");
$cache->setvar("idade", 21);

echo "Meu nome vai ser: " . $cache->getVar("nome");
echo " E eu tenho: " . $cache->getVar("idade") . " anos!";

?>