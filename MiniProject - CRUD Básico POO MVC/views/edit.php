<h3>Editar</h3>

<?php if($error == 'exist'): ?>
	<div class="aviso">Email já existente, tente outro.</div>
<?php endif; ?>

<form method="POST">

	Nome:<br>
	<input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br><br>

	Email:<br>
	<!--<input type="email" name="email"><br><br>-->
	<?php echo $info['email']; ?><br><br>

	<input type="submit" value="Editar">

</form>