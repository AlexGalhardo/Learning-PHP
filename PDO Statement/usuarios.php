<?php

class Usuarios {

	private $db;

	public function __construct(){

		try {
			$this->db = new PDO("mysql:dbname=mp_pdo_statement;host=localhost", "root", "");
		} catch(PDOException $e){
			echo "ERRO: " . $e->getMessage();
		}
	}

	public function selecionar($id){

		// padrão
		// $sql = "SELECT * FROM usuarios WHERE id = '$id';"
		
		// novo comando usando PDO
		// muito mais seguro, pq ele verifica erros de segurança
		// como SQL Injection por exemplo
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
		/**
		 * no bindValue é como se ele passase a variável por valor
		 * ou seja, uma cópia 
		 */
		$sql->bindValue(":id", $id);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(); // só retorna os dados daquele item especifico
		}

		return $array;
	}

	public function inserir($nome, $email, $senha){

		$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
		/**
		 * No bindParam, ele vai associar/REFERENCIAR o apelido
		 * diretamente com a variável
		 *
		 * é como se fosse um ponteiro em C
		 */
		$sql->bindParam(":nome", $nome);
		$sql->bindParam(":email", $email);
		$sql->bindValue(":senha", MD5($senha));
		
		// se eu mudar o $nome = 'outroNome' por exemplo
		// o bindParam garante que ele vai executar com o valor pela referência
		// lógico, antes de executar o ->execute();
		$sql->execute();
	}

	public function atualizar($nome, $email, $senha, $id){

		$sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
		$sql->execute(array(
			$nome, $email, md5($senha), $id
		));
	}

	public function deletar($id){

		$sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
	}
}