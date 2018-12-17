<?php
/**
Manipulação de arquivos e diretórios
A seguir veremos uma série de funções utilizadas exclusivamente para manipulação de arquivos, como sua abertura, leitura, escrita e seu fechamento.

fopen
	Abre um arquivo e retorna um identificador. Aceita arquivos no formato “http://...”.
	resource fopen ( string $filename , string $mode [, ...] )

feof
	Testa se determinado identificador de arquivo (criado pela função fopen()) está no fim de um arquivo (End Of File).
	bool feof ( resource $handle )

fclose
	Fecha o arquivo aberto apontado pela fopen(). Retorna TRUE em caso de sucesso ou FALSE em caso de falha.
	bool fclose ( resource $handle )
	
fgets
	Lê uma linha de um arquivo aberto pela fopen() no formato de string. Recebe opcionalmente um tamanho máximo a ser lido. Se ocorrer um erro, retorna FALSE.
	string fgets ( resource $handle [, int $length ] )
	 Observação: neste exemplo, estamos abrindo o próprio arquivo de código-fonte (identificado pela constante mágica __FILE__).

Exemplo:
*/
$fd = fopen ( __FILE__, "r");

$linha = 1;
while (!feof ($fd)) {
   $buffer = fgets($fd, 4096); // lê uma linha do arquivo
   if ($linha > 1) {
      echo $buffer; // imprime a linha
   }
   $linha ++;
}
fclose ($fd);
/**
 Resultado:
O próprio código-fonte


fwrite
	Grava uma string no arquivo apontado pelo identificador (handle) de arquivo. Se o argumento comprimento (length) for informado, a gravação será limitada a esse tamanho. Retorna o número de bytes gravados ou FALSE em caso de erro.
int fwrite ( resource $handle , string $string [, int $length ] )
Exemplo:
*/
$fp = fopen ("/tmp/file.txt", "w"); // abre o arquivo para gravação
// escreve no arquivo
fwrite ($fp, "linha 1" . PHP_EOL);
fwrite ($fp, "linha 2" . PHP_EOL);
fwrite ($fp, "linha 3" . PHP_EOL);
fclose ($fp); // fecha o arquivo

/**
file_put_contents
Grava uma string (data) em um arquivo (filename). Retorna a quantidade de bytes gravados.
int file_put_contents ( string $filename , mixed $data [, ...] )

Exemplo:
*/
echo file_put_contents('/tmp/teste.txt', "este \n é o conteúdo \n do arquivo");

/**
file_get_contents
	Lê o conteúdo de um arquivo e retorna o conteúdo em forma de string.
	string file_get_contents ( string $filename [, ...] )
*/
echo file_get_contents('/etc/mtab');
/**
 Resultado:
/dev/hda3 / ext3 rw 0 0
/dev/hda1 /windows ntfs rw 0 0
proc /proc proc rw 0 0
usbfs /proc/bus/usb usbfs rw 0 0

file
	Lê um arquivo e retorna um array com seu conteúdo, de modo que cada posição do array represente uma linha do arquivo. O nome do arquivo pode conter o protocolo, como no caso de http://www.server.com/page.html. Dessa forma, o arquivo remoto será lido.
array file ( string $filename [, ...] )
*/
$arquivo = file ("/tmp/file.txt");
foreach ($arquivo as $linha) {
   print $linha;
}
/**
 Resultado:
linha 1 linha 2 linha 3


copy
	Copia um arquivo para outro local/nome. Retorna TRUE caso tenha sucesso e FALSE em caso de falhas.
	bool copy ( string $source , string $dest [, ... ] )
*/
$origem = "/tmp/file.txt";
$destino = "/tmp/file2.txt";
if (copy($origem, $destino))
   echo "Cópia efetuada";
else