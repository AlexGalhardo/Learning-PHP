<?php
/**
 * Simula o XSS, mas esse é FATAL!
 *
 * Pode deletar, alterar e os caralho a quatro no banco de dados!
 */

$email = $_POST['email']; //'teste@gmail.com';
$senha = $_POST['senha']; //'123456';

$pdo = new PDO("mysql:dbname=sqlinjction;host=localhost", "root", "");

$sql = "SELECT * FROM usuarios WHERE email = '$email', AND senha = '$senha'";

/**
 * O FAMOSO SQL INJECTION ;D
 */
/**
 * ESSE COMANDO DELETA TODOS OS DADOS DA TABLE usuarios
 */
$sql = "SELECT * FROM usuarios WHERE email = '' OR '1' = '1' AND senha = '' OR '1'='1';DELETE FROM usuarios WHERE '1'='1'";
$sql = $pdo->query($sql);

/**
 * O correto seria
 */
$email = trim($email);
$senha = md5($senha);
// OU
// esse comando vai substituir todas as apas por barras
$email = addslashes($email);
$senha = addslashes($senha);

/**
 * Quando nós usamos o bindValue, o próprio método do PDO
 * "bindValue" vai garantir que não aconteçam ataques desta forma
 * @var string
 */
$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
$sql = $pdo->prepare($sql);
$sql->bindValue(':email',$email,PDO::PARAM_STR);
$sql->bindValue(':senha',$senha,PDO::PARAM_STR);
$sql->execute();

if($sql->rowCount() > 0){
	echo "Usuário logado!";
} else {
	echo "Errou email/senha.";
}

/**
 * Criptografia
 */
/**
 * SEMPRE É RECOMENDADO USAR HTTPS
 */

/**
 * http://base64encode.org/
 */
$senha1 = "alex123";
$senha2 = "xande321";
$senhacriptografada = md5($senha1);
$senha64 = base64_encode($senha1);
$senhaDecode = base64_decode($senha64);

echo "<br><br>Decode é: " . $senhaDecode;
echo $senha1;
echo "<br>Senha criptografada md5: " . $senhacriptografada;
echo "<br>Senha encode 64: " . $senha64; 

echo "<br><br>Senha 2 é: " . $senha2;