<?php

include 'contato.class.php';

$contato = new Contato();

//$contato->adicionar('alexgalhardo@gmail.com', 'alexgalhardo');
//$contato->adicionar('xande@gmail.com', 'xande');
//$nome = $contato->getNome('xande@gmail.com');
//echo "Nome é: " . $nome;
//$lista = $contato->getAll();
//print_r($lista);
//$contato->editar('Fulano', 'xande@gmail.com');
//$excluido = $contato->excluir('maria@gmail.com');
/*
if($excluido){
	echo "O contato foi excluido!";
} else {
	echo "contato não enncontrado!";
}
*/
?>

<h1>Contatos</h1>

<a href="adicionar.php">[ ADICIONAR ]</a><br><br>

<table border='1' width='600'>

	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>E-MAIL</th>
		<th>AÇÕES</th>
	</tr>

	<?php
	$lista = $contato->getAll();
	foreach($lista as $item):
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td>
			<a href="editar.php?id=<?php echo $item['id']; ?>">[ EDITAR ]</a>
			<a href="excluir.php?id=<?php echo $item['id']; ?>">[ EXCLUIR ]</a>
		</td>
	</tr>
	<?php endforeach; ?>

</table>