<?php
/**
 * SEQUESTRO DE SESSÃO
 */
/**
 * quando entra nesta página, cria uma sessão no servidor
 * enquanto o browser não for fechado
 */
/**
 * a sessão também possui uma referência salva no cookie guardado no browser
 */
/**
 * BAIXAR COOKIE INSPECTOR NO CHROME
 *
 * https://chrome.google.com/webstore/detail/cookie-inspector/jgbbilmfbammlbbhmmgaagdkbkepnijn?hl=en
 */
session_start();
// $_SESSION = array();

// if(empty($_SESSION['numero'])){
//	$_SESSION['numero'] = rand(0, 99);
// }

if(empty($_SESSION['dono'])){
	$_SESSION['dono'] = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
}

$token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

if($_SESSION['dono'] != token){
	exit;
}

echo "MEU SISTEMA ETC...";

print_r($_SESSION);