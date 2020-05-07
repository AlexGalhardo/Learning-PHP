<?php

// NUNCA SALVE NO BANCO DE DADOS UMA SENHA PURA!!!

// MD5 -> provavelmente a mais utilizada hj em dia
// não é reversivel, mas pode ser criado um banco de dados com os hashs dele, ou seja, pode ser descriptografada por sites onlines
// não é recomendo essa função para guardar senha
// vai ser mais fácil do super hacker descriptgrafar a senha por força bruta

// recomendado pelo PHP.NET
$hashDEFAULT = password_hash("123456", PASSWORD_DEFAULT);
$hashBCRYPT = password_hash("123456", PASSWORD_BCRYPT); // recomendado usar esse
$hashMD5 = md5("123456");

echo "DEFAULT: " . $hashDEFAULT;
echo "<hr>";
echo "BCRYPT: " .$hashBCRYPT;
echo "<hr>";
echo "MD5: " .$hashMD5;
echo "<hr>";

$senha = '123456';
if(password_verify($senha, $hashBCRYPT)){
	echo "ACERTOU!";
} else {
	echo "ERROU";
}

/**
 * exemplo sistema de login
 */
$email = 'teste@gmail.com';
$password = '123456';

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
$sql->bindValue(":email", $email);
$sql->execute();

if($sql->rowCount() > 0){
	$dados = $sql->fetch();

	if(password_verify($senha, $dados['senha'])){
		echo "ACERTOU LOGIN!";
	} else {
		echo "ERROU LOGIN";
	}
}