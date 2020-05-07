<?php
require 'config.php';

if(!empty($_POST['email'])){

	$email = $_POST['email'];

	$sql = "SELECT * FROM usuarios WHERE email = :email";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() > 0){

		$sql = $sql->fetch();
		$id = $sql['id'];

		$token = md5(time().rand(0,9999).rand(0,9999));

		$sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";

		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_usuario", $id);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
		$sql->execute();

		//$link = "https://galhardoo.com/redefinir.php?token=".$token;
		$link = "http://localhost/Learning-PHP7/MiniProject%20-%20Esqueci%20Minha%20Senha//redefinir.php?token=".$token;

		$mensagem = "Acesse seu email e clique no link para redefinir sua senha:<br>".$link;

		$assunto = "Redefinição de senha";
		$headers = "FROM: aleexgvieira@gmail.com"."\r\n".
					"X-Mailer: PHP/".phpversion();

		$email = "aleexgvieira@gmail.com";

		mail($email, $assunto, $mensagem, $headers);

		echo $mensagem;
		exit;
	}
}
?>
<form method="POST">
	Qual seu email?<br/>
	<input type="email" name="email"/><br/>

	<input type="submit" value="enviar">
</form>