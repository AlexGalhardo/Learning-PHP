<?php

/**
*   Arquivo com constantes
**/

// Dev 
define('CONST_SERVER', 'us-cdbr-iron-east-04.cleardb.net');
define('CONST_DB_USERNAME', 'b65ecd061693a6');
define('CONST_DB_PASSWORD', 'b2ac0b7f');
define('CONST_DB_NAME', 'heroku_d0d539220a78eed');

// Prod
// define('CONST_SERVER', 'seu.nome.de.servidor');
// define('CONST_DB_USERNAME', 'seu_usuario');
// define('CONST_DB_PASSWORD', 'sua_senha');
// define('CONST_DB_NAME', 'nome_do_bd');

// Imagens
define('CONST_PASTA_IMAGENS', $_SERVER['DOCUMENT_ROOT'] . '/formiga/server/uploads/');

// mysql --host=us-cdbr-iron-east-04.cleardb.net --user=b65ecd061693a6 --password=b2ac0b7f --reconnect heroku_d0d539220a78eed < formiga_db.sql
