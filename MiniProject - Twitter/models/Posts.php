<?php

class Posts extends model {

	public function inserirPost($msg){
		$id_usuario = $_SESSION['twlg'];
	
		$sql = "INSERT INTO mp_twitter_posts SET id_usuario = '$id_usuario', data_post = NOW(), mensagem = '$msg'";
		$this->db->query($sql);
	}

	public function getFeed($lista, $limit){

		$array = array();

		if(count($lista) > 0){
			$sql = "SELECT *, (select nome from mp_twitter_usuarios where mp_twitter_usuarios.id = mp_twitter_posts.id_usuario) as nome FROM mp_twitter_posts WHERE id_usuario IN (".implode(',', $lista).") ORDER BY data_post DESC LIMIT " .$limit;

			// verifica a query que vai ser feita no banco de dados
			// echo $sql;exit;
			
			$sql = $this->db->query($sql); 

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}

		return $array;
	}
}

?>