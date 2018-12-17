<h2>Tela de Cadastro</h2>

<form method="POST">

	Nome:<br/>
	<input type="text" name="nome" /><br/><br/>

	Email:<br/>
	<input type="email" name="email"/><br><br>
	
	Senha:<br>
	<input type="password" name="senha"/>

	<input type="submit" value="Cadastrar" />

	<?php 
	if(!empty($aviso)){
		echo $aviso;
	}
	?>
</form>