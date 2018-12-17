<?php

class Anuncios {

	public function getTotalAnuncios($filtros){
		global $pdo;

		$filtrostring = array('1=1');
		if(!empty($filtros['categoria'])) {
			$filtrostring[] = 'mp_classificados_anuncios.id_categoria = :id_categoria';
		}
		if(!empty($filtros['preco'])) {
			$filtrostring[] = 'mp_classificados_anuncios.valor = BETWEEN :preco1 AND :preco2';
		}
		if(!empty($filtros['estado'])) {
			$filtrostring[] = 'mp_classificados_anuncios.estado = :estado';
		}

		$sql = $pdo->prepare("SELECT COUNT(*) AS totalAnuncios FROM mp_classificados_anuncios WHERE " . implode(' AND ', $filtrostring));
		
		if(!empty($filtros['categoria'])) {
			$sql->bindValue(":id_categoria", $filtros['categoria']);
		}
		if(!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(":preco1", $preco[0]);
			$sql->bindValue(":preco2", $preco[1]);
		}
		if(!empty($filtros['estado'])) {
			$sql->bindValue(":estado", $filtros['estado']);
		}

		$sql->execute();
		$row = $sql->fetch();

		return $row['totalAnuncios'];
	}

	public function getUltimosAnuncios($page, $perPage, $filtros){

		global $pdo;

		$offset = ($page - 1) * 2;

		$array = array();

		$filtrostring = array('1=1');
		if(!empty($filtros['categoria'])) {
			$filtrostring[] = 'mp_classificados_anuncios.id_categoria = :id_categoria';
		}
		if(!empty($filtros['preco'])) {
			$filtrostring[] = 'mp_classificados_anuncios.valor = BETWEEN :preco1 AND :preco2';
		}
		if(!empty($filtros['estado'])) {
			$filtrostring[] = 'mp_classificados_anuncios.estado = :estado';
		}

		$sql = $pdo->prepare("SELECT 
			*, 
			(select mp_classificados_imagens.url 
			from mp_classificados_imagens 
			where mp_classificados_imagens.id_anuncio = mp_classificados_anuncios.id limit 1) as url,
			(select mp_classificados_categorias.nome from mp_classificados_categorias where mp_classificados_categorias.id = mp_classificados_anuncios.id_categoria) as categoria
			FROM mp_classificados_anuncios WHERE " . implode(' AND ', $filtrostring). " ORDER BY id DESC LIMIT $offset, $perPage");

		if(!empty($filtros['categoria'])) {
			$sql->bindValue(":id_categoria", $filtros['categoria']);
		}
		if(!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(":preco1", $preco[0]);
			$sql->bindValue(":preco2", $preco[1]);
		}
		if(!empty($filtros['estado'])) {
			$sql->bindValue(":estado", $filtros['estado']);
		}


		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getMeusAnuncios(){

		global $pdo;
		$array = array();
		$sql = $pdo->prepare("SELECT *, 
			(select mp_classificados_imagens.url 
			from mp_classificados_imagens 
			where mp_classificados_imagens.id_anuncio = mp_classificados_anuncios.id limit 1) as url 
			FROM mp_classificados_anuncios 
			WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getAnuncio($id){

		global $pdo;
		$array = array();

		$sql = $pdo->prepare("SELECT *,
			(select mp_classificados_categorias.nome from mp_classificados_categorias where mp_classificados_categorias.id = mp_classificados_anuncios.id_categoria) as categoria,
			(select mp_classificados_usuarios.telefone from mp_classificados_usuarios where mp_classificados_usuarios.id = mp_classificados_anuncios.id_usuario) as telefone
			FROM mp_classificados_anuncios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			$array['fotos'] = array();

			$sql = $pdo->prepare("SELECT id, url FROM mp_classificados_imagens WHERE id_anuncio = :id_anuncio");
			$sql->bindValue(":id_anuncio", $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array['fotos'] = $sql->fetchAll();
			}
		}

		return $array;
	}

	public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado){

		global $pdo;

		$sql = $pdo->prepare("INSERT INTO mp_classificados_anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->execute();

		return true;
	}

	public function editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id){

		global $pdo;

		$sql = $pdo->prepare("UPDATE mp_classificados_anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if(count($fotos) > 0){
			//print_r($fotos);
			for($q=0; $q<count($fotos['tmp_name']); $q++){
				
				$tipo = $fotos['type'][$q];
				
				if(in_array($tipo, array('image/jpeg', 'image/png'))) {

					$tmpname = md5(time().rand(0,99999)).'.jpg';

					move_uploaded_file($fotos['tmp_name'][$q], 'assets/images/anuncios/'.$tmpname);

					list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$tmpname);
					$ratio = $width_orig/$height_orig;

					$width = 100;
					$height = 100;

					if($width/$height > $ratio){
						$width = $height*$ratio;
					} else {
						$height = $width/$ratio;
					}

					$img = imagecreatetruecolor($width, $height);

					if($tipo = 'image/jpeg') {
						$origi = imagecreatefromjpeg('assets/images/anuncios/'.$tmpname);

					} elseif($tipo = 'image/png') {
						$origi = imagecreatefrompng('assets/images/anuncios/'.$tmpname);
					}

					imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

					imagejpeg($img, 'assets/images/anuncios/'.$tmpname, 80);

					$sql = $pdo->prepare("INSERT INTO mp_classificados_imagens SET id_anuncio = :id_anuncio, url = :url");

					$sql->bindValue(":id_anuncio", $id);
					$sql->bindValue(":url", $tmpname);
					$sql->execute();
				}
			}

			exit;
		}

		return true;
	}

	public function excluirAnuncio($id) {

		global $pdo;

		$sql = $pdo->prepare("DELETE FROM mp_classificados_imagens WHERE id_anuncio = :id_anuncio");
		$sql->bindValue(":id_anuncio", $id);
		$sql->execute();

		$sql = $pdo->prepare("DELETE FROM mp_classificados_anuncios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function excluirFoto($id){
		
		global $pdo;

		$sql = $pdo->prepare("SELECT id_anuncio FROM mp_classificados_imagens WHERE id = :id");

		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$id_anuncio = $row['id_anuncio'];
		}

		$sql = $pdo->prepare("DELETE FROM mp_classificados_imagens WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		return $id_anuncio;
	}

}