<?php
require 'facebook.php';

$fb = new Facebook();

$post = $fb->createPost();
$post->setAuthor("Galhardo");
$post->setMessage("Essa é a mensagem da minha postagem");

echo "Author: " . $post->getAuthor();