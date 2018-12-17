<?php
try {
	$pdo = new PDO("mysql:dbname=mp_filtro_tabela;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
}

if(isset($_POST['sexo']) && $_POST['sexo'] != '') {
	$sexo = $_POST['sexo'];
	$sql = "SELECT * FROM usuarios WHERE sexo = :sexo";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":sexo", $sexo);
	$sql->execute();
} else {
	$sexo = '';
	$sql = "SELECT * FROM usuarios";
	$sql = $pdo->query($sql);
}
?>
<form method="POST">
	<select name="sexo">
		<option></option>
		<option value="0" <?php echo ($sexo=='0')?'selected="selected"':''; ?>>Masculino</option>
		<option value="1" <?php echo ($sexo=='1')?'selected="selected"':''; ?>>Feminino</option>
	</select>
	<input type="submit" value="Filtrar" />
</form>

<table border="1" width="100%">
	<tr>
		<th>Nome</th>
		<th>Sexo</th>
		<th>Idade</th>
	</tr>
	<?php
	$sexos = array(
		'0' => 'Masculino',
		'1' => 'Feminino'
	);
	
	if($sql->rowCount() > 0) {
		foreach($sql->fetchAll() as $usuario):
			?>
			<tr>
				<td><?php echo $usuario['nome']; ?></td>
				<td><?php echo $sexos[$usuario['sexo']]; ?></td>
				<td><?php echo $usuario['idade']; ?></td>
			</tr>
			<?php
		endforeach;
	}
	?>
</table>