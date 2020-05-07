<?php
/**
 * dump ~~ jogar todos os dados do mysql em algum lugar
 */

/**
 * só funciona em um terminal
 */
// exec executa o comando no terminal
// faz com que criamos um arquivo SQL com todos os dados do banco mysql
exec("mysqldump -u username_here -ppassword_here chat > bd_backup.sql");

?>