<?php

class fotos extends model {

	public function getFotos(){

		$array = array();

		$sql = "SELECT * FROM fotos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
}