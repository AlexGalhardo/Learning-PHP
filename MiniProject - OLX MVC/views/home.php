<div class="container-fluid">
	<div class="jumbotron">
		<h2>Nós temos hoje <?php echo $total_anuncios; ?> anúncios.</h2>
		<p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados.</p>
	</div>

	<div class="row">
		<div class="col-sm-3">
			<h4>Pesquisa Avançada</h4>
			<form method="GET">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select id="categoria" name="filtros[categoria]" class="form-control">
						<option></option>
						<?php foreach($categorias as $cat): ?>
						<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id']==$filtros['categoria'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="preco">Preço:</label>
					<select id="preco" name="filtros[preco]" class="form-control">
						<option></option>
						<option value="0-50" <?php echo ($filtros['preco']=='0-50')?'selected="selected"':''; ?>>R$ 0 - 50</option>
						<option value="51-100" <?php echo ($filtros['preco']=='51-100')?'selected="selected"':''; ?>>R$ 51 - 100</option>
						<option value="101-200" <?php echo ($filtros['preco']=='101-200')?'selected="selected"':''; ?>>R$ 101 - 200</option>
						<option value="201-500" <?php echo ($filtros['preco']=='201-500')?'selected="selected"':''; ?>>R$ 201 - 500</option>
					</select>
				</div>

				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select id="estado" name="filtros[estado]" class="form-control">
						<option></option>
						<option value="0" <?php echo ($filtros['estado']=='0')?'selected="selected"':''; ?>>Ruim</option>
						<option value="1" <?php echo ($filtros['estado']=='1')?'selected="selected"':''; ?>>Bom</option>
						<option value="2" <?php echo ($filtros['estado']=='2')?'selected="selected"':''; ?>>Ótimo</option>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Buscar" />
				</div>
			</form>

		</div>
		<div class="col-sm-9">
			<h4>Últimos Anúncios</h4>
			<table class="table table-striped">
				<tbody>
					<?php foreach($anuncios as $anuncio): ?>
					<tr>
						<td>
							<?php if(!empty($anuncio['url'])): ?>
							<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" />
							<?php else: ?>
							<img src="<?php echo BASE_URL; ?>assets/images/default.jpg" height="50" border="0" />
							<?php endif; ?>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>produto/abrir/<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br/>
							<?php echo utf8_encode($anuncio['categoria']); ?>
						</td>
						<td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<ul class="pagination">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL; ?>?<?php
				$w = $_GET;
				$w['p'] = $q;
				echo http_build_query($w);
				?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>


</div>