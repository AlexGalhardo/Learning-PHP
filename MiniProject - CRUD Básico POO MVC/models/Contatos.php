<?php

class Contatos extends model {

	public function getAll(){

		$array = array();

		$sql = "SELECT * FROM mp_mvc_contatos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function get($id){

		$array = array();
		$sql = "SELECT * FROM  mp_mvc_contatos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function add($nome, $email){

		if(!$this->emailExists($email)){

			$sql = "INSERT INTO mp_mvc_contatos (nome, email) VALUES (:nome, :email)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);

			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function edit($nome, $id){
		$sql = "UPDATE mp_mvc_contatos SET nome = :nome WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function delete($id){
		$sql = "DELETE FROM mp_mvc_contatos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	private function emailExists($email){
		$sql = "SELECT * FROM mp_mvc_contatos WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();
	
		if($sql->rowCount() > 0){
			return true;
		} else {
			return false;
		}
	}


}