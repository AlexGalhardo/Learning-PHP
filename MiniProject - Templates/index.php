<?php

require 'template.class.php';

$array = array(
	"titulo" => "Título da página",
	"nome" => "Fulano",
	"idade" => 21
);

$tpl = new Template('template.phtml');

$tpl->render($array);

?>