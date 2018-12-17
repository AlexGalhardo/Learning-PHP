<?php
/**
 * Maior vunerabilidade são os uploads
 * porque podem enviar arquivos para o servidor!
 */

?>

<form method="POST" action="upload.php" enctype="multipart/form-data">

	Arquivo:<br>
	<input type="file" name="foto"><br>

	<input type="submit" value="Enviar">
</form>