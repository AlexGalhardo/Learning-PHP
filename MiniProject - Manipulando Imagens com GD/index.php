<?php

$imagem = "imagem.png";

list($largura_original, $altura_original) = getimagesize($image);

list($largura_mini, $altura_mini) = getimagesize("mini_imagem.png");

$image_final = imagecreatetruecolor($largura_original, $altura_original);



$imagem_original = imagecreatefrompng("imagem.png");
$imagem_mini = imagecreatefrompng("min_imagem.png");

image_copy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);

// colocando marca da água
imagecopy($imagem_final, $imagem_mini, 0, 0, 0, 0, $largura_mini, $altura_mini);

// mostrar imagem no browser
header("Content-Type: image/png");

imagepng($imagem_final, null);

// salvar imagem
imagepng($imagem_final, "imagem_marca_dagua.png");

echo "Imagem criada com sucesso!";

?>