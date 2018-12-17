<?php

$arquivo = "imagem.png";

$largura = 200;
$altura = 200;

/**
 * getimagesize($nome_arquivo)
 *
 * retorna um array com duas propriedades, o list() pega direto esse retorno dos array, e armazena nas variáveis
 */
list($largura_original, $altura_original) = getimagesize($arquivo);

$ratio = $largura_original / $altura_original;

// echo $ratio;

if($largura/$altura > $ratio){
	$largura = $altura * $ratio;
} else {
	$altura = $largura / $ratio;
}

echo "LARGURA ORIGINAL: " . $largura_original;
echo "ALTURA ORIGINAL: " . $altura_original;

echo "LARGURA FINAL: " . $largura;
echo "ALTURA FINAL: " . $altura;

/**
 * Criando uma nova imagem do zero
 */
$imagem_final = imagecreatetruecolor($largura, $altura);

$imagem_original = imagecreatefrompng($arquivo);


imagecopyresampled(
	$imagem_final, 
	$imagem_original, 
	0, 0, 0, 0,  
	$largura, 
	$altura, 
	$largura_original, 
	$altura_original
);

// parametro null -> mostrando na tela
// senão, coloco entre aspas, o diretório onde queremos armazear essa imagem
imagepng($imagem_final, null);
imagepng($imagem_final, "mini_imagem.png");
echo "Imagem redimensionada com sucesso!";

/**
 * no jpeg, precisamos colocar um terceiro paramêtro informado a qualidade da nossa imagem jpeg
 */

/**
 * Quando usamos a função nativa
 * header()
 * nós informamos para o browser interpretar esse arquivo como image/png
 * mesmo tendo o index.php no nome do arquivo!
 */
header("Content-Type: image/png");
imagejpeg($imagem_final, null, 100);

?>