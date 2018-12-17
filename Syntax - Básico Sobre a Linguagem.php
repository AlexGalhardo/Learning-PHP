<?php

// NULL -> não tem valor

// Inferência é a capacidade do compilador de saber o tipo do dado sem que este esteja explicitamente declarado

// quando adicionamos um método ou função para ser executado como paramêtro de outra função, chamamos isso de callback
// exemplo = call_user_func()

$idade = 20;
$nome = 'alex';
// ver tipo de variável
var_dump($idade, $nome)

// imprime saida no console
print 'abc';

// print_r é uma função que imprime o conteúdo de uma variável de forma detalhada, assim como a var_dump(), mas em um formato mais legível para o programador, com os conteúdos alinhados e suprimindo os tipos de dados.
$vetor = array('Alex', 'Fruta', 'Galhardo');
print_r($vetor);

/**
	Constantes
	Uma constante é um valor que não sofre modificações durante a execução do programa. Ela é representada por um identificador, assim como as variáveis, com a exceção de que só pode conter valores escalares (booleano, inteiro, ponto flutuante e string) ou arrays. As regras de nomenclatura de constantes são as mesmas regras das variáveis, exceto pelo fato de as constantes não serem precedidas pelo sinal de cifrão ($) e geralmente utilizarem nomes em letras maiúsculas.
	MAXIMO_CLIENTES // exemplo de constante
	
	Você pode definir uma constante utilizando a função define(). Quando uma constante é definida, ela não pode mais ser modificada ou anulada. Exemplo:
*/	

define('MAXIMO_CLIENTES', 100);
echo MAXIMO_CLIENTES;
 Resultado:
100

/**
 * Funções
 */
function somarNumero($x, $y){
	return $x + $y;
}
somarNumero(4, 5);

/**
 * principais funções matemáticas
 */
echo abs(-10); // 10 torna o valor absoluto de um número
echo ceil(5.6); // 6 arredonda para cima
echo floor(2.9999); // 2 arredonda para baixo
echo round(2.5); // 3 arredonda para o mais próximo
echo round(2.4); // 2 
echo rand(3, 9); // número aleatório entre 3 e 9

$lista = array('alex', 'galhardo', 'jaum', 'maria');

$sorteado = rand(0, 4);
echo "O sorteado é: " . $lista[$sorteado];

/**
 * Manipualação de strings/texto
 */
print_r(explode(',', 'g,a,l,h,a,r,d,o')); // digive uma string em diversos valores em um array ~ o primeiro paramêtro é quando vai ser separado, no caso pela vírgula, e o segundo parametro será a string

print_r(implode(' ', array('Alex', 'Galhardo'))); // é o inverso do explode, ele junta todas as strings do array de acordo com o primeiro parametro, ou seja, vai juntar cada string com 1 espaço

echo number_format(8.2723523763, 2); // formato o número de acordo com as casas decimais definidas no segundo parâmetro
// nesse primeiro caso é no padrão americano, priemrio pela virgula, depois pelo ponto

echo number_format(8.2723523763, 2, ',', '.');
// no padrão brasileiro, adicionamos mais esses 2 parâmetros
// 8.234,567

echo str_replace('roeu', 'comeu', 'O rato roeu a roupa'); // troque a primeira palavra, pela palavra do segundo palavra, na string do terceiro parametro ~ o rato comeu a roupa

echo strtolower('GALHARDO'); // clássico, tudo minusculo ~ galhardo
echo strtoupper('alex'); // clássico, tudo UPPERCASE ~ ALEX

echo substr('Galhardo', 0, 3); // corte a string, começe pelo indice 0, ande 3 indices ~ gal

echo ucfirst('galhardo'); // clássico para nomes em formulários, transforma primeira letra em UPPERCASE ~ Galhardo

echo ucwords('alex galhardo vieira'); // transforma em PascalCase toda a string ~ Alex Galhardo Vieira

/**
 * Manipulação de Arrays
 */
$array = array(
	'nome'=>'alex',
	'idade' => 21,
	'sexo' => 'm',
	'cidade' => 'magrathea'
);

echo array_keys($array); // uma das principais funções de array, ela devolve um array com os indices e as chaves respectivas deste array

echo array_values($array); // mesma lógica do anterior, porém retorna todos os valores do array de acordo com o seu indice

echo array_pop($array); // remove o último registro do array, ou seja, o último indice

echo array_shift($array) ; // mesma ĺógica que o pop, porém remove o primeiro indice do array [0]

echo asort($array); // ordena os VALORES do array em ordem alfabetica
echo asort($array);// mesma lógica que o asort, porém ordena os valors em ordem decrescente do alfabetico

echo count($array); // retorna o total de registros(indices) do array

echo in_array('alex', $array); // muito usado em condicionais, ou seja, existe o valor 'alex' no $array? se tiver, ele torna TRUE

/**
 * Valores Numericos
 */
floatval($valor); // transforma o valor no tipo float
intval($valor); // transforma o valor no tipo inteiro

/**
	Superglobais 

	são variáveis disponibilizadas pelo próprio PHP em qualquer local em que você esteja executando, seja no programa principal, dentro de uma função, ou por um método específico. Elas possivelmente carregam alguns conteúdos, dependendo de como o script foi invocado, como nos exemplos a seguir:

	• $_SERVER – Contém informações sobre o ambiente em que o script está rodando, como endereço do servidor, da requisição, nome do script acessado, entre outros. Por exemplo, na posição HTTP_USER_AGENT, há informações sobre o browser do request; na posição SCRIPT_FILENAME, há o caminho do script sendo executado no servidor.

	• $_GET – Contém um vetor com as variáveis informadas em uma requisição $_GET. Por exemplo, a requisição http://localhost/sample.php?name=john&age20 retorna um vetor com as posições john e age, contendo os respectivos valores.

	• $_POST – Funciona da mesma maneira que $_GET, mas contém as informações enviadas pelo método POST, geralmente usado no envio de formulários.

	• $_FILES – Contém um vetor com informações dos arquivos enviados para upload. Esta pode ser acessada logo após o upload de um arquivo por upload via formulário.

	• $_COOKIE – Contém um vetor com as informações recebidas pelo script que atualmente estão armazenadas nos cookies.

	• $_SESSION – Contém um vetor com as variáveis da sessão do usuário.

	• $_REQUEST – Contém um vetor com as informações de $_GET, $_POST, e $_COOKIE.

	• $_ENV – Contém um vetor com variáveis de ambiente. Possivelmente útil ao executarmos um script PHP pela linha de comando, pois contém informações sobre o usuário do sistema operacional (USER), diretório home do usuário (HOME), entre outros dados.
	
	• $GLOBALS – Contém uma lista com todas as variáveis globais disponíveis para o script.
*/


/**
 * Tipagem Estrita
 * deve ser usado onde a função for chamada, e não definada!
 */
declare(strict_types=1);
function calcula_imc(float $peso, float $altura):float {
	var_dump($peso, $altura);
	return $peso / ($altura*$altura);
}

var_dump(calcula_imc(75, 1.85));
var_dump(calcula_imc('75.1', 2));


/**
 * utf8_encode
 *
 * formata o texto com charset utf8
 */
utf8_encode('string_aqui');

/**
 * in_array()
 *
 * verifica se determinada string está presenta na string
 */
in_array('ana', 'banana'); // true

/**
 * https://www.wikiwand.com/pt/Crontab
 */
curl "http://galhardoo.com/agenda.php"

/**
 * file_exists()
 *
 * verifica se certo arquivo existe em determinado local
 */
file_exists('./classes/Usuarios.class.php');

/**
 * explode()
 *
 * separa em um array, uma string onde bate com o caracter 
 */
explode('.', 'alex.galhardo'); // -> ['alex', 'galhardo']

/**
 * count()
 *
 * conta o número de elementos
 */
count(array('alex', 'galhardo', 'vieira')) // 3