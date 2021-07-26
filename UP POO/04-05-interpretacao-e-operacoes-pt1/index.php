<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.05 - Interpretação e operações pt1");

require __DIR__ . "/source/autoload.php";

/*
 * [ construct ] Executado automaticamente por meio do operador new
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__construct", __LINE__);

//$user = new \Source\Intepretation\User();
$user = new \Source\Intepretation\User(
    "Robson",
    "Leite",
    "cursos@upinside.com.br"
);

var_dump($user);


/*
 * [ clone ] Executado automaticamente quando um novo objeto é criado a partir do operador clone.
 * http://php.net/manual/pt_BR/language.oop5.cloning.php
 */
fullStackPHPClassSession("__clone", __LINE__);

$robson = $user;

$kaue = $robson;
$kaue->setFirstName("Kaue");
$kaue->setLastName("Cardoso");

$robson->setFirstName("Robson");
$robson->setLastName("Leite");

$kaue = clone $robson;
$kaue->setFirstName("Kaue");
$kaue->setLastName("Cardoso");

$gustavo = clone $robson;


var_dump(
    $robson,
    $kaue,
    $gustavo
);


/*
 * [ destruct ] Executado automaticamente quando o objeto é finalizado
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__destruct", __LINE__);