<?php
/**
 Manipulação de funções
Uma função é um pedaço de código com um objetivo específico, encapsulado sob uma estrutura única que recebe um conjunto de parâmetros e retorna um dado. Uma função é declarada uma única vez, mas pode ser utilizada diversas vezes.
É uma das estruturas mais básicas para prover reusabilidade.
1.11.1 Criação
Para declarar uma função em PHP, usa-se o operador function seguido do nome que desejamos definir, sem espaços em branco e iniciando obrigatoriamente com uma letra. Na mesma linha, digitamos a lista de argumentos (parâmetros) que a função irá receber, separados por vírgula. Em seguida, encapsulado por chaves {}, vem o código da função. No final, utiliza-se a cláusula return para retornar o resultado da função (integer, string, array, objeto etc.)
**/
function nome_da_funcao ($arg1, $arg2, $argN) {
   $valor = $arg1 + $arg2 + $argN;
   return $valor;
}
/**
No exemplo a seguir, criamos uma função que calcula o índice de massa corporal. Essa função recebe dois

parâmetros ($peso e $altura) e retorna o valor definido pela fórmula.
**/
function calcula_imc($peso, $altura) {
   return $peso / ($altura * $altura);
}
echo calcula_imc(75, 1.85);
 Resultado:
21.913805697589
/**
1.11.2 Variáveis globais
Todas as variáveis declaradas dentro do escopo de uma função são locais. Para acessar uma variável externa ao contexto de uma função sem passá-la como parâmetro, é necessário declará-la como global. Uma variável global é acessada a partir de qualquer ponto da aplicação. No exemplo a seguir, a função criada converte quilômetros para milhas, enquanto acumula a quantidade de quilômetros percorridos em uma variável global ($total).
**/
$total = 0;
function km2mi($quilometros) {
   global $total;
   $total += $quilometros;
   return $quilometros * 0.6;
}
echo 'percorreu ' . km2mi(100) . " milhas <br>\n";
echo 'percorreu ' . km2mi(200) . " milhas <br>\n";
echo 'percorreu no total ' . $total . " quilometros <br>\n";
/**
 Resultado:
percorreu 60 milhas
percorreu 120 milhas
percorreu no total 300 quilometros
 Observação: a utilização de variáveis globais não é considerada uma boa prática de programação, pois uma variável global pode ser alterada a partir de qualquer parte da aplicação. Dessa maneira, valores inconsistentes podem ser armazenados em uma variável global, podendo resultar em um comportamento inesperado da aplicação.
Variáveis estáticas
Dentro do escopo de uma função, podemos armazenar variáveis de forma estática. Assim, elas mantêm o valor que lhes foi atribuído na última execução. Declaramos uma variável estática com o operador static.
**/
function percorre($quilometros) {
   static $total;
   $total += $quilometros;
   echo "percorreu mais $quilometros do total de $total<br>\n";
}

percorre(100);
percorre(200);
percorre(50);
/**
 Resultado:
percorreu mais 100 do total de 100
percorreu mais 200 do total de 300
percorreu mais 50 do total de 350


Passagem de parâmetros
Há dois tipos de passagem de parâmetros: por valor (by value) e por referência (by reference). Por padrão, os valores são passados by value para as funções. Assim o parâmetro que a função recebe é tratado como variável local dentro do contexto da função, não alterando o seu valor externo. Os objetos são uma exceção, pois são tratados por referência na passagem de parâmetros.
**/
function incrementa($variavel, $valor) {
   $variavel += $valor;
}
$a = 10;
incrementa($a, 20);
echo $a;
/**Resultado:
10

Para efetuar a passagem de parâmetros by reference para as funções, basta utilizar o operador & na frente do
parâmetro; isso faz com que as transformações feitas pela função sobre a variável sejam válidas no contexto externo à função.
*/
function incrementa(&$variavel, $valor) {
   $variavel += $valor;
}
$a = 10;
incrementa($a, 20);
echo $a;
/**
 Resultado:
30


O PHP permite definir valores default para parâmetros. Reescreveremos a função anterior, declarando o default de $valor como 40. Assim, se o programador executar a função sem especificar o parâmetro, será assumido o valor 40.
*/
function incrementa(&$variavel, $valor = 40) {
   $variavel += $valor;
}
$a = 10;
incrementa($a);
/**
echo $a;
 Resultado:



O PHP também permite definir uma função com o número de argumentos variáveis, ou seja, permite obtê-los de forma dinâmica, mesmo sem saber quais são ou quantos são. Para saber quais são, utilizamos a função func_get_args(); para saber a quantidade de argumentos, utilizamos a função func_num_args().
*/
function ola() {
   $argumentos = func_get_args();
   $quantidade = func_num_args();
   for($n=0; $n<$quantidade; $n++) {
      echo 'Olá ' . $argumentos[$n] . ', ';
   }
}
ola('João', 'Maria', 'José', 'Pedro');
/**
Resultado:
Olá João, Olá Maria, Olá José, Olá Pedro,


1.11.5 Recursão
O PHP permite chamadas de funções recursivamente. No caso a seguir, criaremos uma função para calcular o fatorial de um número.
*/
function fatorial($numero) {
   if ($numero == 1)
      return $numero;
   else
      return $numero * fatorial($numero -1);
}
echo fatorial(5) . "<br>\n";
echo fatorial(7) . "<br>\n";
/**
 Resultado:
120


Funções anônimas
Funções anônimas, ou lambda functions, são funções que podem ser definidas em qualquer instante e, diferentemente das funções tradicionais, não têm um nome definido. Funções anônimas podem ficar atreladas à uma variável. Nesse caso, a variável é usada para fazer a chamada imediata da função, bem como passá-la como parâmetro de alguma função. Caso a variável não esteja visível no escopo, a função fica fora de alcance. Uma função anônima pode ser vista como uma função descartável, que se aplica ao contexto no qual é criada.
 Observação: no PHP, funções anônimas são instâncias de uma classe interna chamada Closure.
Funções anônimas são úteis para várias coisas, como passagem de parâmetros e uso como callback de funções. Para iniciar a explicação de funções anônimas, vamos criar uma função anônima que remova o acento de alguns caracteres e atribuir essa função à variável $remove_acento. Veja que a função não tem nome. A única referência para esse código criado é a variável para a qual a função foi atribuída.
A partir da atribuição, a função pode ser atribuída e passada como parâmetro para funções e métodos de objetos. Sempre que quisermos utilizar a função anônima, basta usar a variável na qual ela está definida, como estamos fazendo neste exemplo ao remover os acentos de “José da Conceição”. Por fim, estamos definindo um vetor com vários termos acentuados e chamando a função array_map(), que recebe em seu primeiro parâmetro uma função a ser aplicada (Callback) e como segundo parâmetro um vetor a ser percorrido. Neste caso, estamos aplicando a função $remove_acento ao vetor e exibindo seu resultado.
*/
$remove_acento = function($str) {
   $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Ç', 'È', 'É', 'Ê',
              'Ì', 'Í', 'Ò', 'Ó', 'Ô', 'Õ', 'Ù', 'Ú', 'à',
              'á', 'â', 'ã', 'ç', 'è', 'é', 'ê', 'í', 'î',
              'ò', 'ó', 'ô', 'õ', 'ù', 'ú', 'û', 'ü');
   $b = array('A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E',
              'I', 'I', 'O', 'O', 'O', 'O', 'U', 'U', 'a',
              'a', 'a', 'a', 'c', 'e', 'e', 'e', 'i', 'i',
              'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u');
   return str_replace($a, $b, $str);
};
print $remove_acento('José da Conceição');
print '<br>' . PHP_EOL;
$palavras = array();
$palavras[] = 'José da Conceição';
$palavras[] = 'Jéferson Araújo';
$palavras[] = 'Félix Júnior';
$palavras[] = 'Ênio Müller';
$palavras[] = 'Ângelo Ônix';
// array array_map ( callback $callback , array $arr1 [, array $... ] )
$r = array_map( $remove_acento, $palavras );
print_r($r);
 Resultado:
Jose da Conceicao
Array (
   [0] => Jose da Conceicao
   [1] => Jeferson Araujo
   [2] => Felix Junior
   [3] => Enio Muller
   [4] => Angelo Onix
)