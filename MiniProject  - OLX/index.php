<?php require 'pages/header.php'; ?>

<?php 
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
require 'classes/categorias.class.php';
$anuncios = new Anuncios();
$usuarios = new Usuarios();
$categorias = new Categorias();

$filtros = array(
	'categoria'=>'',
	'preco'=>'',
	'estado'=>''
);

if(isset($_GET['filtros'])){
	$filtros = $_GET['filtros'];
}

$total_anuncios = $anuncios->getTotalAnuncios($filtros);
$total_usuarios = $usuarios->getTotalUsuarios();

$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])){
	$p = addslashes($_GET['p']);
}

$por_pagina = 2;
$total_paginas = ceil($total_anuncios / 2);

$totalAnuncios = $anuncios->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $categorias->getLista(); 
?>
			
		<div class="container-fluid">
			<div class="jumbotron">
				<h2>Nós temos hoje <?php echo $total_anuncios; ?> anuncios</h2>
				<p>E mais <?php echo $total_usuarios; ?> usuários</p>
			</div>

			<div class="row">
				<div class="col-sm-5">
					<h4>Pesquisa avançada</h4>
					<form method="GET">
						<div class="form-group">
							<label for="categoria">Categoria: </label>
							<select id="categoria" name="filtros[categoria]" class="form-control">
								<option></option>
								<?php foreach($categorias as $categoria): ?>
								<option value="<?php echo $categoria['id']; ?>" <?php echo ($categoria['id']==$filtros['categoria']) ? 'selected="selected"' : '' ; ?>><?php echo utf8_encode($categoria['nome']); ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="preco">Preço: </label>
							<select id="preco" name="filtros[preco]" class="form-control">
								<option></option>
								<option value="0-50" <?php echo ($filtros['preco']=='0-50') ? 'selected="selected"' : '' ; ?>>R$ 0 - 50</option>
								<option value="51-100" <?php echo ($filtros['preco']=='51-100') ? 'selected="selected"' : '' ; ?>>R$ 51 - 100</option>
								<option value="101-500" <?php echo ($filtros['preco']=='101-500') ? 'selected="selected"' : '' ; ?>>R$ 101 - 500</option>
								<option value="501-1000" <?php echo ($filtros['preco']=='501-1000') ? 'selected="selected"' : '' ; ?>>R$ 501 - 1000</option>
							</select>
						</div>

						<div class="form-group">
							<label for="estado">Estado: </label>
							<select id="estado" name="filtros[estado]" class="form-control">
								<option></option>
								<option value="0" <?php echo ($filtros['estado']=='0') ? 'selected="selected"' : '' ; ?>>Ruim</option>
								<option value="1" <?php echo ($filtros['estado']=='1') ? 'selected="selected"' : '' ; ?>>Bom</option>
								<option value="2" <?php echo ($filtros['estado']=='2') ? 'selected="selected"' : '' ; ?>>Ótimo</option>
							</select>
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-info" value="Buscar">
						</div>

					</form>
				</div>
				<div class="col-sm-7">
					<h4>Ùltimos Anúncios</h4>
					<table class="table table-striped">
						<tbody>
							<?php foreach($totalAnuncios as $anuncio): ?>
							<tr>
								<td>
									<?php if(!empty($anuncio['url'])): ?>
										<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" border="0" eight="50">
									<?php else: ?>
										<img src="assets/images/anuncios/default.png" height="50" border="0">
									<?php endif; ?>
								</td>
								<td>
									<a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br>
									<?php echo utf8_encode($anuncio['categoria']); ?>
								</td>
								<td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<ul class="pagination">
						<?php for($q=1; $q <= $total_paginas; $q++): ?>
						<li class="<?php echo ($p==$q) ? 'active':''; ?>"><a href="index.php?<?php 
						$w = $_GET;
						$w['p'] = $q;
						echo http_build_query($w);
						?>"><?php echo $q; ?></a></li>
						<?php endfor; ?>
					</ul>

				</div>
			</div>
		</div>

<?php require 'pages/footer.php'; ?>
