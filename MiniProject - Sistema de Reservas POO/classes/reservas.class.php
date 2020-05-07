<?php
class Reservas {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function getReservas($data_inicio, $data_fim) {
		$array = array();

		$sql = "SELECT * FROM reservas WHERE ( NOT ( data_inicio > :data_fim OR data_fim < :data_inicio ) )";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":data_inicio", $data_inicio);
		$sql->bindValue(":data_fim", $data_fim);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function verificarDisponibilidade($carro, $data_inicio, $data_fim) {

		$sql = "SELECT
		*
		FROM reservas
		WHERE
		id_carro = :carro AND
		( NOT ( data_inicio > :data_fim OR data_fim < :data_inicio ) )";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":carro", $carro);
		$sql->bindValue(":data_inicio", $data_inicio);
		$sql->bindValue(":data_fim", $data_fim);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return false;
		} else {
			return true;
		}

	}

	public function reservar($carro, $data_inicio, $data_fim, $pessoa) {
		$sql = "INSERT INTO reservas (id_carro, data_inicio, data_fim, pessoa) VALUES (:carro, :data_inicio, :data_fim, :pessoa)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":carro", $carro);
		$sql->bindValue(":data_inicio", $data_inicio);
		$sql->bindValue(":data_fim", $data_fim);
		$sql->bindValue(":pessoa", $pessoa);
		$sql->execute();
	}














}