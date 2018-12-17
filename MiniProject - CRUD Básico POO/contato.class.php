<?php

class Contato {

	private $pdo;

	public function __construct(){
		$this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
	}
	/**
	 * A gente sempre coloca os paramêtros obrigatórios primeiro
	 * para colocar um parâmetro que não precisa necessariamente, basta colocar = '' depois
	 */
	public function adicionar($email, $nome = ''){
		// 1 passo = verificar se o email já existe no sistema
		// 2 passo = adicionar		
		if($this->existeEmail($email) == false){
			$sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->execute();
			return true;
		} else {
			return false;
		}
	}

	public function getNome($email){
		$sql = "SELECT nome FROM contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			$info = $sql->fetch();

			return $info['nome'];
		}
		else {
			return '';
		}	
	}

	public function getInfo($id){
		$sql = "SELECT * FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		/**
		 * Vai ser só fetch(), porque só vai ter 1 dado
		 */
		if($sql->rowCount() > 0){
			return $sql->fetch();
		} else {
			return array();
		}
	}

	public function getAll(){
		$sql = "SELECT * FROM contatos";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0){
			return $sql->fetchAll();
		} else {
			return array();
		}
	}

	public function editar($nome, $email, $id){
		if($this->existeEmail($email) == false){
			$sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":id", $id);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function excluirPeloEmail($email){
		if($this->existeEmail($email)){
			$sql = "DELETE * FROM contatos WHERE email = :email";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":email", $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function excluirPeloId($id){
		$sql = "DELETE FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}



	private function existeEmail($email){

		$sql = "SELECT * FROM contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		} else {
			return false;
		}
	}
}

?>