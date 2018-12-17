<?php
/**
 * Função usada para enviar os dados para a própria página!
 */
if(isset($_POST['nome']) && !empty($_POST['nome'])){
	echo "<h1>Dados vindos pra cá:</h1><br>";
	?>
	Nome: <?php echo $_POST['nome']; ?><br>
	Email: <?php echo $_POST['email']; ?><br>
	<?php
	echo "Dados enviados para a própria página!";
}
?>

<h1>Adicionar Dados</h1>

<?php
/**
 * Quando eu coloco ACTION, os dados serão enviados para outro arquivo
 *
 * Se eu NÃO USAR O ACTION, os dados são enviados para o próprio arquivo!
 */
?>

<form method="POST">

	Nome: <br>
	<input type="text" name="nome"><br><br>

	Email:<br>
	<input type="email" name="email"><br><br>

	<input type="submit" value="Adicionar">
</form>