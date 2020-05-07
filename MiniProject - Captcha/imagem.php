<?php
session_start();

// para transformar arquivo em image/jpeg
header("Content-type: image/jpeg");

$n = $_SESSION['captcha'];

// largura, altura
$imagem = imagecreate(100, 50);

// image, cores rgb (0~255, 0~255, 0~255)
// 000 -> preto
// fff -> branco
// cor, brilho, opacidade
imagecolorallocate($imagem, 200, 200, 200);


$fontcolor = imagecolorallocate($imagem, 20, 20, 20);

// image, tamanho_fonte, localização, posição x, posição y, cor da fonte, imagem otf,  número
imagettftext($imagem, 40, 0, 21, 35, $fontcolor, __DIR__.'/Ginga.otf', $n);	
// imagettftext($imagem, 40, 0, 21, 35, $fontcolor, __DIR__.'/Ginga.otf', $n);

imagejpeg($imagem, null, 100);
?>