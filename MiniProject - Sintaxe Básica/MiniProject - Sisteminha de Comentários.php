<?php
/**
 * Faça conexão com o banco de dados com PDO
 */
try {
	/**
	 * Tente conectar ao banco de dados
	 * @var PDO
	 */
	$pdo = new PDO("mysql:dbname=projeto_comentarios;host=localhost", "root", "");

} catch (PDOException $e){
	/**
	 * Senão, jogue uma excessão
	 */
	echo "ERRO: " . $e->getMessage();
}

/**
 * Verifica se ouve envio de dados
 * 
 * Se o usuário mandou algum dado pelo formulário, pegue esse dados e guarde no banco de dados
 */
if(isset($_POST['nome']) && !empty($_POST['nome'])){

	$nome = $_POST['nome'];
	$texto = $_POST['texto'];

	$sql = $pdo->prepare("INSERT INTO mensagens SET nome = :nome, texto = :texto, data_msg = NOW()");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":texto", $texto);
	$sql->execute();
}
?>

<fieldset>
	<form method="POST">
		Nome:<br>
		<input type="text" name="nome"><br><br>

		Mensagem:<br>
		<textarea name="texto"></textarea><br><br>

		<input type="submit" value="Enviar Mensagem">
	</form>
</fieldset>
<br><br>

<?php
	/**
	 * Faça uma query no banco de dados
	 *
	 * Se a variavel possuir mais de 1 linha
	 *
	 * Para cada linha da variavel $sql como $mensagem, trasnforme ele em um array
	 *
	 * 
	 */
	$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0){
		foreach($sql->fetchAll() as $mensagem):

			?>
			<strong><?php echo $mensagem['nome'] ?></strong><br>
			<?php echo $mensagem['texto']; ?>
			<hr>
			<?php
		endforeach;
	} else {
		echo "Não há mensagens";
	}
?>
