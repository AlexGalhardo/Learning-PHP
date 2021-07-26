<?php

/**
 * Qual a diferença entre sessão e cookie?
 */

/**
 * Sessão == guarda informações da sessão do usuário no SERVIDOR
 * A sessão é destruida quando o usuário fecha o browser
 *
 * Cookie == guarda informações do usuário no browser dele, por uma tempo determinado pelo programador
 *
 * O Cookie vai ficar no browser do usuário até o limite ou se o usuário deletar ele
 */
/**
 * Sempre colocar session_start antes de qualquer outro código php
 */
session_start();

$_SESSION["nome"] = "Alex";

echo "Sessão foi feita";

echo "<br><br>Meu nome é " . $_SESSION["nome"];

/**
 * Crie o cookie 'meuteste',
 * chamado alex galhardo,
 * que dure 1 hora
 */
setcookie("meuteste", "alex galhardo", time()+3600);

echo "<br><br>Meu cookie é : ". $_COOKIE["meuteste"];


?>