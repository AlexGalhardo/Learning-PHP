<?php

require 'classes.php';

$form = new Form();

$form->addElement(new Label('Usuários'));
$form->addElement(new InputText('usuario'));

$form->addElement(new Label('Senha'));
$form->addElement(new InputText('senha', 'password'));

echo $form->render();