<?php
/**
 * Vai causar erro fatal
 */
try {

	aiushasoa();

} catch(Exception $e){

	echo "Erro: " . $e->getMessage();

}

/**
 * Throwable
 * consigo pegar o erro, e eu mesmo tratar ele
 * além dele não travar o código
 */
try {
	aiushasoa();
} catch(Throwable $e){
	echo "Erro: " . $e->getMessage();
	echo "Erro de sintax...";
	echo "Erro no arquivo: " . $e->getFile();
	echo "Erro na linha: " . $e->getLine();
	$msg = $e->getMessage();
	file_put_contents('erro.txt', $msg); // salvar erro no arquivo
	exit; // parar script?
}

echo "Continuando scrip...";