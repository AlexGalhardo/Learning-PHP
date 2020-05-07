<?php

class Relacionamentos extends model {

	public function seguir($seguidor, $seguido){

		$sql = "INSERT INTO mp_twitter_relacionamentos SET id_seguidor = '$seguidor', id_seguido = '$seguido'";

		$this->db->query($sql);
	}

	public function deseguir($seguidor, $seguido){

		$sql = "DELETE FROM mp_twitter_relacionamentos WHERE id_seguidor = '$seguidor' AND id_seguido = '$seguido'";
		$this->db->query($sql);
	}
}
?>