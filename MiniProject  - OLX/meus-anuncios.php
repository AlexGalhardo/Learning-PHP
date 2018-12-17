<?php require 'pages/header.php'; ?>

<?php

if(empty($_SESSION['cLogin'])){
	?>
	<<script type="text/javascript">window.location.href="login.php"</script>
	<?php
	exit;
}
?>

<div class="container">
	<h1>Meus anúncios</h1>

	<a href="add-anuncio.php" class="btn btn-default">Adicionar Anúncio</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Título</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>	
		</thead>
		<?php
		require 'classes/anuncios.class.php';
		$anuncios = new Anuncios();
		$anuncios = $anuncios->getMeusAnuncios();

		foreach($anuncios as $anuncio):
		?>

		<tr>
			<td>
				<?php if(!empty($anuncio['url'])): ?>
					<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" border="0" eight="50">
				<?php else: ?>
					<img src="assets/images/anuncios/default.png" height="50" border="0">
				<?php endif; ?>
			</td>
			<td><?php echo $anuncio['titulo']; ?></td>
			<td><?php echo number_format($anuncio['valor'], 2); ?></td>
			<td>
				<a class="btn btn-default" href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>">Editar</a>
				<a class="btn btn-danger" href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>">Excluir</a>
			</td>
		</tr>

		<?php endforeach; ?>
	</table>
</div>

<?php require 'pages/footer.php'; ?>