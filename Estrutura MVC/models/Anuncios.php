<?php

class Anuncios extends model {

	public function getQuantidade(){
		$sql = "SELECT COUNT(*) as totalAnuncios FROM estrutura_mvc_anuncios";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			return $sql['totalAnuncios'];
		} else {
			return 0;
		}
	}
}