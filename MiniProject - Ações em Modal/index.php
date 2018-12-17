<?php
$pdo = new PDO("mysql:dbname=acoes_modal;host=localhost", "root", "");
$sql = $pdo->query("SELECT * FROM usuarios");
$usuarios = $sql->fetchAll();
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Ações em Modal</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<script src="script.js"></script>
	</head>

	<h1>Usuários</h1>

	<table border="1" width="500">
	<?php foreach($usuarios as $usuario): ?>
		<tr
		data-nome="<?php echo $usuario['nome']; ?>"
		data-email="<?php echo $usuario['email']; ?>"
		data-senha="<?php echo $usuario['senha']; ?>"
		data-id="<?php echo $usuario['id']; ?>"
			>
			<td><?php echo $usuario['nome']; ?></td>
			<td><?php echo $usuario['email']; ?></td>
			<td><?php echo $usuario['senha']; ?></td>
			<td>
                <a href="javascript:;" onclick="editar(this)">Editar</a>
				<!-- COM AJAX -->
				<!--<a href="javascript:;" onclick="editar('<?php echo $usuario['id']; ?>')">Editar</a>
				-->
				<a href="javascript:;" onclick="excluir('<?php echo $usuario['id']; ?>')">Excluir</a>
			</td>
		</tr>

	<?php endforeach; ?>
	</table>

	
	<div id="modal-editar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<form method="POST">

						Nome:<br>
						<input type="text" name="nome" value="<?php echo $info['nome']; ?>"></br></br>

						Email:<br>
						<input type="email" name="email"></br></br>

						Senha:<br>
						<input type="text" name="senha"></br></br>

						<input type="submit" value="Editar">

						<input type="hidden" name="id">
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL COM REQUISIÇÕES AJAX -->
	<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">...</div>
			</div>
		</div>
	</div>


	</body>
</html>
