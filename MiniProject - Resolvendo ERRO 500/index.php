<?php

// mostra todas as informações do php
// para mostrar onde se encontra o arquivo "php.ini"
phpinfo();
exit;

// ativa o display_errors = "On"
// reinicie o servidor

/**
 * Houve algum erro no lado do servidor
 */

// é quando o servidor não esta configurado para exibir erros
// é bom habilitar essa função no php.ini, enquanto estiver desenvolvendo

// todo o tipo de erro que acontecer, deve ser computado
error_reporting(E_ALL);

// ativa a propriedade do arquivo no servidor(php.ini) para On
ini_set("display_errors", "On");

// você chamou uma função que não existe
auhsalksopas();

// se não mostrar erros deste modo, provavelmente é por causa do arquivo .htaccess