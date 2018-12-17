<?php

class DataBase {
	protected $db;

	public function __construct() {
		try {
			$this->db = new PDO("mysql:dbname=dp_dao;host=localhost", "root", "");
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e){
			echo "ERRO: " . $e->getMessage();
			die($e->getMessage());
		}
	}
}

class UsuarioDAO extends DataBase {

	public function __construct() {
		// constructor da classe pai
		parent::__construct();
	}

	public function get($fields = array(), $where = array()){
		$usuarios = array();
		$valores = array();
	
		if(count($fields) == 0){
			$fields = array('*');
		}

		$sql = "SELECT " . implode(',', $fields). " FROM usuarios";

		if(count($where) > 0) {
			$tabelas = array_keys($where);
			$valores = array_values($where);
		
			$comp = array();

			foreach($tabelas as $tabela){
				$comp[] = $table . " = ?";
			}

			$sql .= implode(" AND ", $comp);
		}	

		$sql = $this->db->prepare($sql);
		$sql->execute($valores);

		if($sql->rowCount() > 0){
			foreach($sql->fetchAll() as $item){
				$usuarios[] = new Usuario($item);
			}
		}

		return $usuarios;
	}

	public function insertArray($fields = array()){

		if(count($fields) > 0){

			$questions = array();

			for($q=0; $q < count(array_keys($fields));$q++){
				$questions[] = '?';
			}

			$sql = "INSERT INTO usuarios (". implode(',', array_keys($fields)) . ") VALUES (". implode(',', $questions) .")";

			$sql = $this->db->prepare($sql);
			$sql->execute(array_values($fields));

		}
	}

	public function insertObject(Usuario $usuario){

		$fields = array(
			'nome' => $usuario->getName(),
			'email' => $usuario->getEmail(),
			'senha' => $usuario->getSenha(),
			'id' => $usuario->getId()
		);

		if(count($fields) > 0){

			$questions = array();

			for($q=0; $q < count(array_keys($fields));$q++){
				$questions[] = '?';
			}

			$sql = "INSERT INTO usuarios (". implode(',', array_keys($fields)) . ") VALUES (". implode(',', $questions) .")";

			$sql = $this->db->prepare($sql);
			$sql->execute(array_values($fields));

		}
	}
}

class Usuario {

	private $nome;
	private $email;
	private $senha;
	private $id;

	public function __construct($array){
		$this->nome = (isset($array['nome'])) ? $array['nome']: '';
		$this->email = (isset($array['email'])) ? $array['email']: '';
		$this->senha = (isset($array['senha'])) ? $array['senha']: '';
		$this->id = (isset($array['id'])) ? $array['id']: '';
	}

	public function getname(){ return $this->nome;}
	public function getEmail(){ return $this->email;}
	public function getId(){ return $this->id; }
	public function getSenha(){ return $this->senha; }
}