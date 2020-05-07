<?php

class Usuarios {

	public function getTotalUsuarios(){
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) AS totalUsuarios FROM mp_classificados_usuarios");
		$row = $sql->fetch();

		return $row['totalUsuarios'];
	}

	public function cadastrar($nome, $email, $senha, $telefone){

		global $pdo;

		$sql = $pdo->prepare("SELECT id FROM mp_classificados_usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0){

			$sql = $pdo->prepare("INSERT INTO mp_classificados_usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");

			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

	public function login($email, $senha){

		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM mp_classificados_usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));

		$sql->execute();

		if($sql->rowCount() > 0){
			// pega os dados do usuário para fazer a SESSION
			// metodo fetch() devolve um array da linnha da tabela dos dados de 1 usuário
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;
		} else {
			return false;
		}
	}

}