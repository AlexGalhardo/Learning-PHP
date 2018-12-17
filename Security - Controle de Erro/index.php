<?php
init_set("display_errors", "Off");
phpinfo();

// configuration file (php.ini) path
// loaded configuration file
// CTRL +F

// error_reporting = E_ALL

/**
 * display_erros deve estar on para area de DESENVOLVIMENTO para ajudar no debug das códigos
 *
 * e DEVE ESTAR OFF em produção, para não ser mostrado erros aos usuários
 */
// display_errors = On

/**
 * Guarda todos os logs de erro neste arquivo no servidor
 */
// error_log = ~/php_error.log