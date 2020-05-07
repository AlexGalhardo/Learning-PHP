<?php
/**
 * Antes
 */
define("CONFIG_DBNAME", "banco");
define("CONFIG_DBUSER", "root");
define("CONFIG_DBPASS", "root");

echo CONFIG_DBNAME;

/**
 * PHP7
 */
define("CONFIG", array(
	'dbname' => 'banco',
	'dbuser' => 'root',
	'dbpass' => ''
));

echo CONFIG['dbname'];

define("INFO", array(
	'nome' => 'galhardoapp',
	'version' => 'root',
));

echo INFO['nome'];