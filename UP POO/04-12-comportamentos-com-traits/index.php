<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um compoetamento
 * do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

$user = new \Source\Traits\User("Robson", "Leite", "cursos@upinside.com.br");
$address = new \Source\Traits\Address("Nome da rua", 3339, "Casa 10");

$register = new \Source\Traits\Register(
    $user,
    $address
);

var_dump(
    $register,
    $register->getUser(),
    $register->getAddress(),
    $register->getUser()->getFirstName(),
    $register->getAddress()->getStreet()
);

$cart = new \Source\Traits\Cart();
$cart->add(1, "Full Stack PHP Developer", 1, 2000);
$cart->add(2, "Laravel Developer", 2, 1000);
$cart->add(3, "WS PHP", 5, 500);
$cart->remove(2, 1);
$cart->remove(3, 5);

$cart->checkout($user, $address);

var_dump($cart);