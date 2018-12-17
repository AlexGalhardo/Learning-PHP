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
 * tipos de variáveis
 */
$nome = "alex"; // string
$idade = 90; // integer
$nota = 7.5; // float
$ligado = true; // boolean
$caracteristicas = array("feliz", "triste"); // array é uma variável composta

// mudando valor da variável nome
$nome = "xande";

/**
 *
 * Variáveis Compostas
 */

$grupos = array ("alex", "galhardo", 80);

$variavel = array(
	"nome" => "Alex",
	"sobrenome" => "galhardo",
	"idade" => 20,
	"sexo" => "masculino"
);

/**
 * Printar o primeiro indice do array
 */

echo $variavel[0] = "fulano";
echo $variavel["nome"];


/**
 * Criando array de arrays
 * @var array
 */
$produtos = array(
	0 => array(
		"tipo" => 'chuteira',
		"marca" => "adidas"
	),
	1 => array(
		"marca" => "gap",
		"tamanho" => "G"
	),
	2 => array(
		"nome" => "breja",
		"quantidade" => 30
	)
);

print_r($produtos);



/**
 * Simula um dicionário como se fosse em python
 *
 * "nome" é a chave == Alex é o valor
 */
echo $variavel["nome"];

/**
 * Mudei o valor da chave idade para 30
 */
$variavel["idade"] = 30;


/**
 * Mostrar o array completo
 */
print_r($variavel);



/**
 * Variaveis Globais 
 */

/**
 * Variavel global já dentro do servidor
 */
print_r($_SERVER);

$youtube = array(
	"video" => "urlvideo"
);

echo PHP_VERSION;

echo "<br>";

echo DIRECTORY_SEPARATOR;

define("SERVIDOR", "127.0.0.1");

echo SERVIDOR;

define("BANCO_DE_DADOS", [
	'127.0.0.1',
	'root',
	'password',
	'test'
], true); // TRUE ==> case insensitive == pode ser maiúscula ou minúscula

print_r(BANCO_DE_DADOS);

/**
 * GET É USADO QUANDO USO ?nome=alex
 * Aparece na URL quando enviado
 */
$nome = $_GET["nome"];
echo "Seu nome é " . $nome;

/**
 * Constantes
 */

define("URL", "https://galhardoo.com");

define("VERSION", "1.0");

echo "<br>Meu site é ".URL;
echo "<br>E a versão deste site é " . VERSION;

/**
 * Formas de usar variáveis
 */

$nomee = "fulano";
/**
 * Este modo troca a variavel $nome pelo seu valor
 */
echo "<br>Aspas dulpas == Meu nome é $nomee";

/**
 * Este modo deixa o texto em modo literal, texto mesmo
 */
echo '<br>Aspas simples == Meu nome é $nomee';

?>