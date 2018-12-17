<?php require 'pages/header.php'; ?>

<div class="container">

	<h1>Login</h1>

	<?php
	require 'classes/usuarios.class.php';
	$usuarios = new Usuarios();
	if(isset($_POST['email']) && !empty($_POST['email'])){

		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];

		if($usuarios->login($email, $senha)){
			?>
	
			<script type="text/javascript">
				window.location.href="./";
			</script>

			<?php

		} else {
			?>

			<div class="alert alert-danger">
				Usuário ou Senha Incorretos!
			</div>

			<?php
		}

	}
	?>

	<form method="POST">

		<div class="form-group">
			<label for="nome">Email: </label>
			<input type="email" name="email" class="form-control">
		</div>

		<div class="form-group">
			<label for="nome">Senha: </label>
			<input type="password" name="senha" class="form-control">
		</div>

		<input type="submit" value="Login" class="btn btn-default">
		
	</form>

</div>

<?php require 'pages/footer.php'; ?>