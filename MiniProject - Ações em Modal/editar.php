<?php
sleep(2);
$id = $_POST['id'];

$pdo = new PDO("mysql:dbname=acoes_modal;host=localhost", "root", "");
$sql = $pdo->query("SELECT * FROM usuarios WHERE id = '$id'");

if($sql->rowCount() > 0){

	$info = $sql->fetch();

	?>

	<form method="POST">

		Nome:<br>
		<input type="text" name="nome" value="<?php echo $info['nome']; ?>"></br></br>

		Email:<br>
		<input type="email" name="email" value="<?php echo $info['email']; ?>"></br></br>

		Senha:<br>
		<input type="text" name="senha" value="<?php echo $info['senha']; ?>"></br></br>

		<input type="submit" value="Editar">

		<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
	</form>

	<?php
}

?>

