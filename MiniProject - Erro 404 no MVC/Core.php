<?php

/**
 * No arquivo Core.php, adicione o if abaixo
 */
.
.
.
.
	// se o arquivo do controler não existir
	// defina o controller a ser usado pela requisição
	// e selecione o index como método principal
	// e se existir o controller, mas não possuir o método
	// também use o controller not found
	if(!file_exists('controllers/'.$currentController.'.php' ||  !method_exists($currentController, $currentAction))){
		$currentController = 'notfoundController';
		$currentAction = 'index';
	}