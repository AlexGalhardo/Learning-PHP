<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.12 - Removendo registro ativo");

require __DIR__ . "/../source/autoload.php";

/*
 * [ destroy ] Deleta um registro ativo
 */
fullStackPHPClassSession("destroy", __LINE__);

$model = new \Source\Models\UserModel();

$user = $model->load(5);
if ($user) {
    $user->destroy();
}

var_dump($user);

/*
 * [ model destroy ] Deletar em cadeia
 */
fullStackPHPClassSession("model destroy", __LINE__);

$list = $model->all(100, 30);

if ($list) {
    /** @var \Source\Models\UserModel $user */
    foreach ($list as $user) {
        var_dump($user);
        $user->destroy();
    }
}

var_dump($list);

