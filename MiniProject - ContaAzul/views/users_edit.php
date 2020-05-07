<h1>Usuários - Editar</h1>

<?php if(isset($error_msg) && !empty($error_msg)): ?>
<div class="warn"><?php echo $error_msg; ?></div>
<?php endif; ?>

<form method="POST">
	<label for="email">E-mail</label><br/>
	<?php echo $user_info['email']; ?><br/><br/>

	<label for="password">Senha</label><br/>
	<input type="password" name="password" /><br/><br/>

	<label for="group">Grupo de Permissões</label><br/>
	<select name="group" id="group" required>
		<?php foreach($group_list as $g): ?>
		<option value="<?php echo $g['id']; ?>" <?php echo ($g['id']==$user_info['id_group'])?'selected="selected"':''; ?>><?php echo $g['name']; ?></option>
		<?php endforeach; ?>
	</select><br/><br/>

	<input type="submit" value="Editar" />

</form>