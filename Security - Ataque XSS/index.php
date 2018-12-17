<?php
/**
 * Não rouba dados nem nada do tipo necessariamente, mas permite a inserção de scripts maliciosos dentro do site
 *
 * Principalmente de javascript
 */
/**
 * O addslashes adiciona uma barra invertida em todas àspas do código.
 * O htmlspecial chars substitui as chaves de abertura html < e > por seu código ascii :D 
 * Se não quiser que o usuário possa implantar HTML na sua página, é interessante usar os dois!
 */
?>

<form method="POST" action="busca.php">

	<input type="text" name="htmlspecialchars"/><br/><br/>

	<input type="text" name="addslashes"/><br/><br/>

	<input type="submit" value="Pesquisar" />

</form>