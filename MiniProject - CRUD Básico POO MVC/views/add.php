<h3>Adicionar</h3>

<?php if(isset($_GET['error']) && $_GET['error'] == 'exist'): ?>
	<div class="aviso">Email já existente, tente outro.</div>
<?php endif; ?>

<form method="POST" action="<?php echo BASE_URL; ?>contatos/add_save">

	Nome:<br>
	<input type="text" name="nome"><br><br>

	Email:<br>
	<input type="email" name="email"><br><br>

	<input type="submit" value="Adicionar">

</form>