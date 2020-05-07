<?php require 'pages/header.php'; ?>

<div class="container">

	<h1>Cadastre-se</h1>
	<?php
	require 'classes/usuarios.class.php';
	$usuarios = new Usuarios();
	if(isset($_POST['nome']) && !empty($_POST['nome'])){

		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);

		if(!empty($nome) && !empty($senha) && !empty($email)){

			if($usuarios->cadastrar($nome, $email, $senha, $telefone)){
				?>
				<div class="alert alert-sucess">
					Dados cadastrados com sucesso!<br>
					<a class="alert-link" href="login.php">Fazer Login</a>
				</div>
				<?php
			} else {
				?>
				<div class="alert alert-danger">
					Dados incorretos ou já cadastrados!<br>
					<a class="alert-link" href="login.php">Fazer Login</a>
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php


		}
	}
	?>

	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control">
		</div>

		<div class="form-group">
			<label for="nome">Email: </label>
			<input type="email" name="email" class="form-control">
		</div>

		<div class="form-group">
			<label for="nome">Senha: </label>
			<input type="password" name="senha" class="form-control">
		</div>

		<div class="form-group">
			<label for="nome">Telefone: </label>
			<input type="text" name="telefone" class="form-control">
		</div>

		<input type="submit" value="Cadastrar" class="btn btn-default">
		
	</form>

</div>

<?php require 'pages/footer.php'; ?>