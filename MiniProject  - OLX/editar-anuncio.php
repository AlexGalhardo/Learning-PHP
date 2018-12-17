<?php require 'pages/header.php'; ?>

<?php

if(empty($_SESSION['cLogin'])){
	?>
	<<script type="text/javascript">window.location.href="login.php"</script>
	<?php
	exit;
}

require 'classes/anuncios.class.php';
$anuncios = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {

	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	$estado = addslashes($_POST['estado']);
	if(isset($_FILES['fotos'])){
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}

	$anuncios->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);

	?>

	<div class="alert alert-success">
		Produto editado com sucesso!
	</div>

	<?php
}

if(isset($_GET['id']) && !empty($_GET['id'])){
	$info = $anuncios->getAnuncio($_GET['id']);
} else {
	?>
	<script type="text/javascript">window.location.href="meus-anuncios.php";</script>
	<?php
	exit;
}

?>

<div class="container">
	<h1>Meus anúncios - Editar Anúncios</h1>

	<form method="POST" enctype="multipart/form-data">
	
		<div class="form-group">
			<label for="categoria">Categoria:</label>
			<select name="categoria" id="categoria" class="form-control">
				<?php
				require 'classes/categorias.class.php';
				$categorias = new Categorias();
				$cats = $categorias->getLista();
				foreach($cats as $cat):
					?>

					<option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected=selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>

					<?php
				endforeach;
				?>
			</select>
		</div>	

		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
		</div>

		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control" value="<?php echo $info['valor']; ?>">
		</div>

		<div class="form-group">
			<label for="titulo">Descrição:</label>
			<textarea name="descricao" class="form-control"><?php echo $info['descricao']; ?></textarea>
		</div>

		<div class="form-group">
			<label for="valor">Estado de Convervação:</label>
			<select name="estado" class="form-control">
				<option value="0" <?php echo ($info['estado']=='0')?'selected=selected"':''; ?>>Ruim</option>
				<option value="1" <?php echo ($info['estado']=='1')?'selected=selected"':''; ?>>Bom</option>
				<option value="2" <?php echo ($info['estado']=='2')?'selected=selected"':''; ?>>Ótimo</option>
			</select>
		</div>
		<div class="form-group">
			<label for="add-foto">Fotos do anúncio:</label>
			<input type="file" name="fotos[]" multiple>

			<div class="panel panel-default">
				<div class="panel-heading">Fotos do Anúncio</div>
				<div class="panel-body">
					<?php foreach($info['fotos'] as $foto): ?>
					<div class="foto_item">
						<img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0"><br>
						<a href="excluir-foto.php?id=<?php echo $foto['id']; ?>" class="btn btn-default">Excluir Imagem</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<input type="submit" value="Editar Dados" class="btn btn-default"/>

	</form>

</div>


<?php require 'pages/footer.php'; ?>