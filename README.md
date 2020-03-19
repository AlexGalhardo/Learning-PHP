### Referências 
- [https://www.php.net/](https://www.php.net/)
- [https://php.com.br](https://php.com.br)
- [https://thephp.website/](https://thephp.website/)
- [https://phpinternals.news/](https://phpinternals.news/)
- [https://www.tutorialrepublic.com/php-tutorial/](https://www.tutorialrepublic.com/php-tutorial/)
- [Livro PHP Programando Orientado a Objetos 4 Edição - Pablo Dall’Oglio](https://www.amazon.com.br/Php-Programando-com-Orienta%C3%A7%C3%A3o-Objetos/dp/8575226916/ref=pd_cp_14_1/135-0612714-8828249?_encoding=UTF8&pd_rd_i=8575226916&pd_rd_r=8a07c6aa-d481-4aa7-90dd-091df6d0efa7&pd_rd_w=aCGTP&pd_rd_wg=Rmgqp&pf_rd_p=77453d05-f992-4c68-90bd-4bd32fc86a60&pf_rd_r=HY27PBJKFGJ5TW4R7K3S&psc=1&refRID=HY27PBJKFGJ5TW4R7K3S)
- [https://www.w3schools.com/php7/default.asp](https://www.w3schools.com/php7/default.asp)

## Eventos
- [PhpConference](https://phpconference.com/)
- [PHP Experience](https://eventos.imasters.com.br/phpexperience/)
- [PHPRS Conf](https://conference.phprs.com.br/)
- [PHPSC Conf](https://conf.phpsc.com.br/)

## Melhores Práticas
- [https://www.php-fig.org/](https://www.php-fig.org/)
- [https://thephpleague.com/](https://thephpleague.com/)
- [github.com/design-patterns-for-humans](https://github.com/kamranahmedse/design-patterns-for-humans">https://github.com/kamranahmedse/design-patterns-for-humans)
- [https://github.com/PHPSP/php-the-right-way](https://github.com/PHPSP/php-the-right-way)
- [https://phpbestpractices.org/](https://phpbestpractices.org/)

## PSRs
 - Geral
    - O código DEVE usar 4 espaços para indentação ao invés de tabs..
    - Cada linha deve ter 80 caracteres ou menos.
    - As linhas em branco PODEM ser adicionadas para aumentar a legibilidade e para indicar blocos de código relacionados.
 - Arquivos
    - Todos os arquivos PHP DEVEM usar o fim da linha Unix LF (linefeed).
    - Todos os arquivos PHP DEVEM terminar com uma única linha em branco.
    - A tag de fechamento ?> DEVE ser omitida em arquivos que contêm apenas PHP.
    - NÃO DEVE haver espaço em branco no final de linhas.
    - Palavras-chave do PHP DEVEM ser em letra minúscula (lower case).
    - As constantes do PHP true, false e null DEVEM ser em letra minúscula (lower case).
 - Classes e Namespaces
    - Os arquivos devem conter apenas código PHP.
    - Os arquivos DEVEM usar apenas as tags <?php and <?= tags.
    - Arquivos devem usar apenas UTF-8.
    - O nome das classes deve ser declarado em: StudlyCaps.
    - Os métodos em: camelCase
    - Você precisa colocar uma linha em branco apos declarações de namespace e use.
    - Aberturas e fechamento de classes e dos metodos nas classes devem estar em uma linha isolada.
    - A visibilidade deve ser declara em todos os métodos das classes (Public, Protected ou Private).
    - As constantes de classe DEVEM ser declaradas em maiúsculas com os separadores de sublinhado.
    - A palavra-chave VAR não deve ser usada para declarar uma propriedade.
    - Exemplo:
      ```php
      <?php  
        namespace Vendor\Package;

        use FooInterface;
        use BarClass as Bar;
        use OtherVendor\OtherPackage\BazClass;

        class Foo extends Bar implements FooInterface
        {
            public $foo = null;
    
        public function sampleMethod($a, $b = null)
        {
            if ($a === $b) {
                bar();
            } elseif ($a > $b) {
                $foo->bar($arg1);
            } else {
                BazClass::bar($arg2, $arg3);
            }
        }

        final public static function bar()
        {
            // method body
        }
        }
      ```
 - Blocos de controle e funções
    - Palavras-chave de controle (if, while, for, foreach, switch) devem ter um espaço entre a o fechamento do parêntese e abertura do bloco.
    - Na lista de argumentos, NÃO DEVE haver um espaço antes de cada vírgula e DEVE haver um espaço após cada vírgula.
    - Blocos de controle como if devem ter a abertura de bloco na mesma linha e fechamento em uma linha isolada
    - Exemplo:
    ```php
     <?php
     function foo()
     {
         // function body
     }

     if($argumento1,espaço $argumento2,espaço $argumento3  = [])espaço{
         4espaçoes codigo
     }
    ```
- 1 = Basic Coding Standard
    - Arquivos sempre devem utilizar apenas o <?php
    - Sempre salvar arquivos PHP em UTF-8 sem BOM
    - Arquivos devem OU declarar simbolos (classes, functions, constantes, etc...) OU efeitos-colaterais (escrever algo na tela, dar um output)
    - Classes devem sempre usar um sistema de autoload (PSR 0, PSR 4)
    - Nomes de classes devem sempre utilizar StudlyCaps
    - Constantes devem sempre ser MAIUSCULAS ou com UNDERSCORE
    - Nomes de métodos de classes devem seguir o padrão camelCase
- 2 = Coding Style Guide
    - O código deve seguir a PSR-1
    - O código deve usar identação de 4 espaços, não tabs
    - Cada linha deve ter 80 caracteres, no máximo 120, ou menos
    - Após a declaração do namespace ou use, deve se ter uma linha em branco
    - A abertura e fechamento das classes devem ser feitas na próxima linha.
    - A Abertura e fechamento dos métodos devem ser feitas na próxima linha.
    - A visibilidade deve ser declarada em todas as propriedades na próxima linha
    - Condicionais devem ter um espaço entre elas, nas funções/métodos não.
    - A abertura das condicionais devem ser feitas na mesma linha. O fechamento na  próxima.
    - Os parâmetros das funções/métodos, não devem conter espaços no começo e no fim.


## Outros
- [Nic.br](https://www.nic.br/)
- [Ceweb.br](https://ceweb.br/)
- [CGI.br](https://cgi.br/)
- [EnableCORS.org](https://enable-cors.org/)
- [Php Weekend](http://phpweekend.com.br/)
- [Schema.org](https://schema.org/)

## Cursos Online
- [https://alunos.b7web.com.br/](https://alunos.b7web.com.br/)
- [https://www.upinside.com.br/](https://www.upinside.com.br/)
- [https://php.com.br/c7?cursos](https://php.com.br/c7?cursos)
- [Curso Completo de PHP7 - Udemy](https://www.udemy.com/curso-php-7-online/learn/v4/overview)

## DB GUI Softwares
- [SequelPRO](https://www.sequelpro.com/)
- [Dbeaver](https://dbeaver.io/download/)
- [HeidiSQL](https://www.heidisql.com/)
- [MySQL WorkBench](https://www.mysql.com/products/workbench/)

## Ferramentas
    
 - Comandos úteis
   - phpinfo();
   - $ php -v
 - Composer & Components
    - https://getcomposer.org
    - https://packagist.org
    - $ sudo apt install composer
    - $ composer init
    - $ composer install
    - $ composer update
    - https://packagist.org/packages/google/apiclient
    - https://packagist.org/packages/coffeecode/
    - https://packagist.org/packages/phpmailer/phpmailer
    - https://packagist.org/packages/league/plates
    - https://packagist.org/packages/league/oauth2-google
    - https://packagist.org/packages/league/oauth2-facebook
    - https://packagist.org/packages/league/oauth2-github
    - https://packagist.org/packages/matthiasmullie/minify
    - https://packagist.org/packages/monolog/monolog
    - https://packagist.org/packages/fabpot/goutte
    - https://packagist.org/packages/guzzlehttp/guzzle
    - https://packagist.org/packages/fzaninotto/faker
    - https://packagist.org/packages/respect/validation
    - https://packagist.org/packages/stichoza/google-translate-php
    - https://packagist.org/packages/intervention/image
    - https://packagist.org/packages/stefangabos/zebra_image
    - https://packagist.org/packages/sinergi/browser-detector
    - https://packagist.org/packages/cocur/slugify
    - https://packagist.org/packages/phpunit/phpunit
    - https://packagist.org/packages/dompdf/dompdf
 - <strong>Composer Errors</strong>
    - Cannot create cache directory /home/<user>/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache
       - $ sudo chown -R $USER $HOME/.composer
    - Do not run Composer as root/super user! See https://getcomposer.org/root for details
    - How do I install untrusted packages safely? Is it safe to run Composer as superuser or root?#
       - $ composer install --no-plugins --no-scripts ...
       - $ composer update --no-plugins --no-scripts ...

 - Template Engines
    - https://platesphp.com/
    - https://twig.symfony.com/
    - https://packagist.org/packages/jenssegers/blade
 

## Exemplo de composer.json
```json
{
    "name": "alexgalhardo/url_do_repositorio_github",
    "description": "Descrição do meu projeto",
    "minimum-stability": "stable",
    "license": "MIT",
    "authors": [
        {
            "name": "alexgalhardo",
            "email": "aleexgvieira@gmail.com",
            "role": "developer",
            "homepage": "https://alexgalhardo.com"
        }
        
    ],
    "autoload": {
        "psr-4": {
            "Source\\": "source"
        },
        "files": [
            "source/Config.php",
            "source/Helpers.php"
        ]
    },
    "require": {
        "ext-json": "*",
        "coffeecode/router": "1.0.7",
        "coffeecode/datalayer": "1.1.4",
        "coffeecode/optimizer": "2.0.0",
        "phpmailer/phpmailer": "6.0.7",
        "league/plates": "v4.0.0-alpha",
        "league/oauth2-facebook": "2.0.1",
        "league/oauth2-google": "3.0.2",
        "league/oauth2-client": "^2.0",
        "matthiasmullie/minify": "1.3.61"
    }
}
```
 
## Bits & Bytes

 - [ASCII CODE - American Standard Code for Information Interchange Table](https://www.ascii-code.com/)
 - 1Kbit = 2^10 = 1024 bits
 - 1KByte = 2^10 * 8 = 8.192 bits
 - 1Mbit = 2^20 = 1.048.576 bits 
 - 1MByte = 2^20 * 8 = 8.388.608 bits
 - 20Mbits = 20 * 2^20 = 20.971.520 bits
 - 20MByte = 20 * 2^20 * 8 = 167.772.160 bits
 - Plano de 100Mbits = (100 * 2^20) / 8 = 104.857.600 / 8 = 13.107.200 bits/s = 13MB/s 

## Lógica Pagination
    TOTAL = 54
    10 itens por página
    quantidade de páginas = 54 / 10 = 5.4 Ou seja => 5 págnas inteiras
    e mais 4 itens na última página
    6 páginas total
    OFFSET = de onde eu começo?
    Na programação, sempre começamos pelo 0, mas aqui começaremos pelo 1
    OFFSET da página 2 = (10 * numero da página) = numero da página = (10*2) - 10 = 20 - 10 = 10
    
    EXEMPLO:
    $limit = 10; // 10 postagens por página
    $offset = intval($_GET['page']) * $limit - $limit;

## spl_autoload_register
```php
spl_autoload_register(function($class){
    if(file_exists("dao/". $class . ".php")){
        require "dao/". $class . ".php";
    }
    if(file_exists("models/{$class}.php")){
        require "models/{$class}.php";
    }
});
```

## Variáveis Globais
```php
/**
 * VARIÁVEIS SUPERGLOBAIS
 * Superglobais
 * Superglobais — Superglobais são variáveis 
 * nativas que estão sempre disponíveis em todos escopos
 * https://www.php.net/manual/pt_BR/language.variables.superglobals.php
 * https://pt.stackoverflow.com/questions/227200/qual-a-diferen%C3%A7a-entre-vari%C3%A1veis-globais-e-superglobais
 */
 $GLOBALS
$_SERVER
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_REQUEST
$_ENV

/**
 * Qual a diferença entre variáveis globais e superglobais? 
 * A diferença é que as super globais não há a necessidade de informar global $variavel, você simplesmente acessa. 
 * Elas estão disponíveis em todos os escopos
 */
```

## DATETIME & TIMESTAMPS
```php

/**
 * DATETIME & TIMESTAMPS
 * https://www.php.net/manual/en/function.date.php#refsect1-function.date-parameters
 * http://www.diogomatheus.com.br/blog/php/trabalhando-com-datas-no-php/
 * https://github.com/diogomatheus/Example-DateTime-PHP
 * /
/*
Carácter	Descrição
d	Dia do mês (2 dígitos)
D	Dia do mês (Representação textual, Mon até Sun)
m	Mês (2 dígitos)
M	Mês (Representação textual, Jan até Dec)
y	Ano (2 dígitos)
Y	Ano (4 dígitos)
l	Dia do mês (Representação textual, Sunday até Saturday)
h	Hora (12 horas)
H	Hora (24 horas)
i	Minutos (2 dígitos)
s	Segundos (2 dígitos)
a	am ou pm
A	AM ou PM
*/
```
- index.html
```html
<h2>Máquina do Tempo</h2>
    <form action="datetime.php" method="post">
        <div id="firstDate">
            Dia: <input type="text" name="dayOne" class="simple" />
            Mês: <input type="text" name="monthOne" class="simple" />
            Ano: <input type="text" name="yearOne" class="full" /> &nbsp;
            Hora: <input type="text" name="hourOne" class="simple" />
            Minuto: <input type="text" name="minuteOne" class="simple" />
            Segundo: <input type="text" name="secondOne" class="simple" />
        </div>
        <br />
        <div id="operationType">
            Tipo de operação:
            <select name="operationType">
            <option value="A">Adição</option>
            <option value="S">Subtração</option>
            <option value="D">Diferença</option>
            <option value="C">Comparação</option>
        </select>
        </div>
        <br />
        <div id="secondDate">
            Dia: <input type="text" name="dayTwo" class="simple" />
            Mês: <input type="text" name="monthTwo" class="simple" />
            Ano: <input type="text" name="yearTwo" class="full" /> &nbsp;
            Hora: <input type="text" name="hourTwo" class="simple" />
            Minuto: <input type="text" name="minuteTwo" class="simple" />
            Segundo: <input type="text" name="secondTwo" class="simple" />
        </div>
        <br />
        <input type="submit" value="Calcular" />
    </form>
```

- datetime.php
```
function buildDateTime($hour, $minute, $second,
        $month, $day, $year) {
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    $date = new DateTime("now",
            new DateTimeZone('America/Sao_Paulo'));
    $date->setTimestamp($timestamp);
    return $date;
}

function buildDateInterval($hour, $minute, $second,
        $month, $day, $year) {
    $interval = "P{$year}Y{$month}M{$day}D";
    $interval .= "T{$hour}H{$minute}M{$second}S";
    return new DateInterval($interval);
}

// Função para simplificar resgate de informações
function getPostParam($name) {
    return !isset($_POST[$name]) ? 0 : (int) $_POST[$name];
}

// Resgatar valores
$hourOne = getPostParam('hourOne');
$minuteOne = getPostParam('minuteOne');
$secondOne = getPostParam('secondOne');
$monthOne = getPostParam('monthOne');
$dayOne = getPostParam('dayOne');
$yearOne = getPostParam('yearOne');

$operationType = $_POST['operationType'];

$hourTwo = getPostParam('hourTwo');
$minuteTwo = getPostParam('minuteTwo');
$secondTwo = getPostParam('secondTwo');
$monthTwo = getPostParam('monthTwo');
$dayTwo = getPostParam('dayTwo');
$yearTwo = getPostParam('yearTwo');

// Monta datas e intervalo
$dateOne = buildDateTime($hourOne, $minuteOne,
    $secondOne, $monthOne, $dayOne, $yearOne);

$intervalTwo = buildDateInterval($hourTwo, $minuteTwo,
    $secondTwo, $monthTwo, $dayTwo, $yearTwo);

$dateTwo = buildDateTime($hourTwo, $minuteTwo,
    $secondTwo, $monthTwo, $dayTwo, $yearTwo);

// Verifica tipo de operação e calcula resultado
switch ($operationType) {
    case 'A':
        $dateOne->add($intervalTwo);
        $resultado = "O resultado da adição é
            {$dateOne->format('d/m/Y H:i:s')}.";
        break;
    case 'S':
        $dateOne->sub($intervalTwo);
        $resultado = "O resultado da subtração é
            {$dateOne->format('d/m/Y H:i:s')}.";
        break;
    case 'D':
        $diff = $dateOne->diff($dateTwo);
        $resultado = "A diferença entre as datas é de ";
        $resultado .= "{$diff->format('%d Dias')} ";
        $resultado .= "{$diff->format('%m Meses')} ";
        $resultado .= "{$diff->format('%y Anos')} ";
        $resultado .= "{$diff->format('%h Horas')} ";
        $resultado .= "{$diff->format('%i Minutos')} ";
        $resultado .= "{$diff->format('%s Segundos')}.";
        break;
    case 'C':
        if($dateOne == $dateTwo) {
            $resultado = "As datas informadas são iguais.";
        } else if($dateOne > $dateTwo) {
            $resultado = "{$dateOne->format('d/m/Y H:i:s')}
                é maior que {$dateTwo->format('d/m/Y H:i:s')}.";
        } else {
            $resultado = "{$dateTwo->format('d/m/Y H:i:s')}
                é maior que {$dateOne->format('d/m/Y H:i:s')}.";
        }
        break;
}
```
## JSON
```php
$pessoas = array();

array_push($pessoas, array(
	"nome"=>"João",
	"idade"=>20
));

array_push($pessoas, array(
	"nome"=>"Glaucio",
	"idade"=>25
));

echo json_encode($pessoas);

$json = '[{"nome":"Jo\u00e3o","idade":20},{"nome":"Glaucio","idade":25}]';

$data = json_decode($json, true);

var_dump($data);
```

## Introdução
```php
// https://www.cloudbooklet.com/upgrade-php-version-to-php-7-4-on-ubuntu/

// Apache recebe a requisição
// Manda pro local correto
// Chama o PHP para interpretar o código PHP
// O PHP manda o resultado para o Apache
// O apache junta com o que não é interpretado

// FAST CLI HTTP SERVER
// $ cd project-folder
// $ php -S localhost:8000

// Print dados
echo 'Olá Mundo!';

$firstName = "Alex";
$lastName = "Galhardo";
echo "<br><hr>Olá {$firstName} {$lastName}, seja bem vindo!";

// Tipo de Dados
$false = false;
$true = true;
$inteiro = 90;
$float = 23.5;
$nulo = null;
$array = array();
$string = "AlexGalhardo";


// Concatenação de informações
echo "<br><hr>O numero inteiro é: " . $inteiro . " e o numero float é: " . $float;
// aspas duplas, vai entender o valor das variáveis
$completeName = "Apas duplas: $firstName $lastName"; 
// aspas simples, vai entender nome da variável, e não seu valor
$literalCompleteName = 'Aspas simples: $firstname $lastName';
echo "<br><hr> $completeName";
echo "<br><hr> $literalCompleteName";

// Arrays
$ingredientes = [
    'açucar',
    'farinha de trigo',
    'ovo',
    'leite',
    'fermento em pó'
];

// programação sempre começa em 0
echo "<br><hr>Primeiro ingrediente do array ingredientes[0]: $ingredientes[0]";
// Se der erro Notice: aviso meio grave, uma notificação

// Array Spread PHP7.4
$ingredientes2 = [
    ...$ingredientes,
    'corante'
];
echo "<br><hr>Primeiro ingredientes2[0]: $ingredientes2[0]";

$lista1 = ['alex', 'joao', 'pedro'];
$lista2 = ['maria', 'adriana', 'julia'];
$lista3 = [...$lista1, ...$lista2];
print "<br><hr>";
print_r($lista3);
```

## Condicionais & Loops
```php
// CONDICIONAIS IF & ELSE
$idade = 18;
if($idade > 18){
    echo "Maior de 18 anos!";
} else if($idade < 18){
    echo "Menor de 18 anos!";
} else {
    echo "Igual 18 anos!";
} 
/*
X < Y maior
X > Y menor
X == Y igual
X != Y diferente
X >= Y maior ou igual que
X <= Y menor ou igual que
*/

// Condicional Ternário/Operador ternário/ if de uma linha
// (CONDIÇÃO) ? RESULTADO POSITIVO : RESULTADO NEGATIVO
echo "<br><hr>";
$idade2 = 20;
echo ($idade2 < 18) ? 'Menor de idade' : 'Maior de idade';

// Condicional NULL CAO PHP7.4
echo "<br><hr>CONDICIONAL NULL CAO PHP7.4: ";
$nome = 'Alex';
// $sobrenome = 'Galhardo';
$nomeCompleto = $nome;
// verifica se sobrenome existe
$nomeCompleto .= isset($sobrenome) ? $sobrenome : '';
// $sobrenome existe? use ela! SENÃO use ''
$nomeCompleto .= $sobrenome ?? '';
echo $nomeCompleto;

// SWITCH
echo "<br><hr>";
$tipo = 'foto';
if($tipo == 'foto'){
    echo "exibindo foto";
}
if($tipo == 'video'){
    echo "exibindo video";
} if($tipo == 'texto'){
    echo "exibindo texto";
}
// Nesse caso acima vale mais a pena usar SWITCH
echo "<br><hr>";
$tipo2 = 'video';
switch($tipo2){
    case 'foto':
        echo "exibindo Foto";
        break;
    case 'video':
        echo "exibindo VIDEO";
        break;
    case 'texto':
        echo "exibindo TEXTO";
        break;
}

// LOOP WHILE
echo "<br><hr>";
$numero = 10;
while($numero > 0){
    echo "Numero atual: $numero <br>";
    $numero--;
}

echo "<hr>";
// LOOP FOR é um pouco mais seguro que WHILE
// porque possui começo, meio e fim
for($numeroFor=0; $numeroFor<=10; $numeroFor++){
    echo "Numero atual do FOR LOOP: $numeroFor <br>";
}

// LOOP FOREACH, usado para trabalhar com arrays
// for each = para cada
echo "<hr>";
$ingredientes = [
    'açucar',
    'farinha de trigo',
    'ovo',
    'leite',
    'fermento em pó'
];

// pegando cada valor do array
foreach($ingredientes as $ingrediente){
    echo "Item: $ingrediente <br>";
}

echo "<hr>";
// pegando cada chave e valor do array
foreach($ingredientes as $chave => $valor){
    echo "Chave: $chave Valor: $valor <br>";
}

```
## ForEach
```php
$meses = array(
	"Janeiro", "Fevereiro", "Março",
	"Abril", "Maio", "Junho",
	"Julho", "Agosto", "Setembro",
	"Outubro", "Novembro", "Dezembro"
);

foreach ($meses as $index => $mes) {

	echo "Índice: ".$index."<br/>";
	echo "O mês é ".$mes. "<br/><br/>";

}

if(isset($_GET)){
	foreach ($_GET as $key => $value) {
		echo "Nome do campo: " . $key . "<br/>";
		echo "Valor do campo: " . $value . "<br/>";
		echo "<hr/>";
	}
}
```


## Funções
```php
<?php

// FUNÇÕES
function digaOla(){
    echo "Olá alex! <br>";
}
// execute a função 3 vezes
digaOla();
digaOla();
digaOla();

// Com definição de parâmetros e definição de retorno
function somar(int $valor1, int $valor2): int {
    $somaFinal = $valor1 + $valor2;
    return $somaFinal;
    // tudo que acontece em la vegas, fica em las vegas
}
echo "<hr>A soma final é: " . somar(10, 20);

// com definição de parâmetro opcional
function multiplicar(int $num1, int $num2, int $num3 = 1): int {
    return $num1 * $num2 * $num3;
}
echo "<hr>A multiplicação de 10 x 20 é: ". multiplicar(10, 20);
echo "<hr>A multiplicação de 10 x 20 x 30 é: ". multiplicar(10, 20, 30);

// Passar parâmetros como REFERÊNCIA 
// SIMULA BASTANTE A LINGUAGEM C E C++
// ao invés de passar só o valor da variável
// ela vai passar a "REFERÊNCIA DELA/ENDEREÇO DE MEMÓRIA
// para que a variável também possa ser editada dentro da função
$total = 100;
function novaSoma(int $param1, int $param2, int &$total): int {
    $total += 100;
    return $param1+$param2;
}
echo "<hr>Total antigo é: $total";
echo "<hr>novaSoma(500, 250) é: " . novaSoma(500, 250, $total);
echo "<hr>Total novo é: $total";

// exemplo de função nativa
echo "<hr>Ordenando a lista: <br>";
$lista = [8, 7, 6, 5, 4, 3, 2, 1];
sort($lista);
print_r($lista);

// Funções Anônimas
// Quando usamos funções anônimas?
// 1 - Armazenando em uma variável
// 2 - servir como uma função que eu consiga jogar em qualquer lugar
$dizimo = function(int $valor) {
    return $valor * 0.1;
};
echo "<hr> Dizimo é: ". $dizimo(90);

$funcao = $dizimo(100);
echo "<hr> funcao é: " .$funcao;

// Funções Flexa (Arrow Function) PHP7.4
$funcClassica = function($valor){
    return $valor * 0.1;
};

// => já indica valor de return
$funcArrow = fn(int $valor) => $valor * 0.2;
echo "<hr> funcArrow(100)é: " . $funcArrow(100);

// Funções recursivas
// função que executa ela mesmo internamente
echo "<hr> RECURSÃO: <br>";
function dividir($numero){
    $metade = $numero / 2;
    echo $metade . "<br>";
    if(round($metade) > 0){
        dividir($metade);
    }
}
dividir(10000);

// Funções nativas de MATEMÁTICA
// https://www.php.net/manual/pt_BR/book.math.php
echo "<hr>FUNÇÕES NATIVAS DE MATEMÁTICA<br>";
$numeroAbsoluto = -8.4;
echo "<br>Numero absoluto de -8.4 é: " . abs($numeroAbsoluto);
echo "<br>Numero pi é: " . pi();
$arredondaParaBaixo = 2.7;
echo "<br>Arredonda 2.7 para baixo é: " , floor($arredondaParaBaixo);
$arrendondaParaCima = 3.1;
echo "<br>Arredonda 3.1 para cima é : " . ceil($arrendondaParaCima);
$arredondaProxima = 3.428712;
echo "<br>Arredonda próximo 3 casas decimais de 3.428712 é: " 
. round($arredondaProxima, 3);
echo "<br>Numero aleatório: " . rand(3, 9) . "<br>";
$lista = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo "<br>Maior numero da lista é: " . max($lista);

// Funções Nativas de String
$MAISUCULA = "ALEX GALHARDO";
$minuscula = "alex galhardo";
echo "<hr><br>Minuscula é: " . strtolower($MAISUCULA);
echo "<br>Maiuscula é: " . strtoupper($minuscula);
echo "<br>Tamanho do nome é: " . strlen($MAISUCULA);
$nomeSujo = "  alexgalhardo  ";
echo "<br>Limpando '  alexgalhardo  ' temos: " . trim($nomeSujo);
$nomeOriginal = "Alex Galhardo";
$nomeAlterado = str_replace('Galhardo', 'Vieira', $nomeOriginal);
echo "<br>Nome Alterado é: " . $nomeAlterado;
$nomeIncompleto = substr($nomeOriginal, 0, 3);
echo "<br>Nome Incompleto pegando os 3 primeiro caracter é: " . $nomeIncompleto;
```

## Arquivos
```php
// lendo arquivos
$texto = file_get_contents("texto.txt");
// \n clássico para pular linha
$texto = explode("\n", $texto);
$linhas =  count($texto);
// escrevendo em arquivos
$adicionarTxt = "Novo text para enviar no arquivo";
// se arquivo não existi, vai criar
// se arquivo existir, vai substituir
// se diretório não tiver permissão de escrita, vai dar erro
file_put_contents('nome.txt', $adicionarTxt);
// renomear arquivo
rename('teste.txt', 'novoNome.txt');
// movendo 
rename('teste.txt', 'pasta/teste.txt');
// fazendo copia
copy('pasta/teste2.txt', 'teste2.txt');
// excluindo qualquer arquivo
unlink('pasta/teste2.txt');
```

## Upload Arquivos
```php
/**
 * UPLOAD DE ARQUIVOS
 */
?>
<form method="POST" action="recebedor.php" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="Enviar">
</form>

<?php
// recebedor.php
echo '<pre>';
print_r($_FILES);

$permitidos = ['image/jpeg', 'image/png', 'image/png'];
if(in_array($FILES['arquivo']['type'], $permitidos)){
    // $fileName = $_FILES['arquivo']['name']; não recomendado!
    $fileName = md5(time().rand(0, 1000)). '.jpg';
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/'.$nome);
    echo "arquivo enviado com sucesso!";
} else {
    echo "arquivo não permitido!";
}
```

## Formulário Validações Sessão Cookies 
- index.php
```php
<?php

require_once('header.php');
session_start();
// METHOD=POST -> MANDA INFORMAÇÕES INTERNAMENTE
// METGOD=GET -> MANDA INFORMAÇÕES NA URL

if($_SESSION['aviso']){
    echo $_SESSION['aviso'];
    $_SESSION['aviso'] = '';
}
?>

<a href="apagar.php">Apagar Cookie</a>

<form method="POST" action="recebedor.php">
    <label>Nome</label>
    <br>
    <input type="text" name="nome"/>
    <br>

    <label>email</label>
    <br>
    <input type="text" name="email"/>
    <br>

    <label>Idade</label>
    <br>
    <input type="text" name="idade"/>

    <br>
    <input type="submit" value="Enviar">
</form>
```
- apagar.php
```php
<?php

setcookie('nome', '', time() - 3600);

header("Location: index.php");
exit;
```
- header.php
```php
<h1>Cabeçalho</h1>
<?php 
    if(isset($_COOKIE['nome'])) {
        $nome = $_COOKIE['nome'];
        echo "<h2>".$nome."</h2>";
    }
?>
<hr>
```
- recebedor.php
```php
<?php 
session_start();

// verifica se esta preenchido ou não
// se não estiver, retorne false
// $nome = filter_input(INPUT_GET, 'nome');
// $idade = filter_input(INPUT_GET, 'idade');

// PARA METODOS POST
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT);

// $sobrenome = "Galhardo";
// filter_var($sobrenome, ALGUMA_VERIFICAO_AQUI);

// FILTER_VALIDATE_EMAIL
// FILTER_VALIDATE_INT
// FILTER_VALIDATE_IP
// FILTER_VALIDATE_URL

// FILTER_SANITIZE_EMAIL
// FILTER_SANITIZE_STRING
// FILTER_SANITIZE_SPECIAL_CHARS
// FILTER_SANITIZE_URL
// FILTER_SANITIZE_NUMBER_FLOAT

if($nome && $idade && $email){

    // só consigo setar um cookie, tem que ser antes de qualquer informação
    // parametros => nomedocookie, o que vai ser armazenado, tempo do cookie
    
    // 86400 = segundos em 1 dia/24 horas
    // cokie vai durar 30 dias no navegador do usuário
    $tempo_do_cookie = time() + (86400 * 30); 
    setcookie('nome', $nome, $tempo_do_cookie);

    echo "NOME é: {$nome} e a idade é: {$idade}";
} else {
    $_SESSION['aviso'] = 'Preencha os itens corretamente!';
    // echo "NÃO ENVOU NOME!";
    // redireciona para o index.php
    // só posso fazer redirecionamento de header
    // se eu não tiver mandado nenhuma informação para o navegador
    header("Location: index.php");
    exit; // cancela os códigos abaixo dessa linha
}
```

## POO
- Usuario.php
```php 
<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}
	
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function login($login, $password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results) > 0) {
			$this->setData($results[0]);
		} else {
			throw new Exception("Login e/ou senha inválidos.");
		}
	}

	public function setData($data){
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()
		));
		
		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}

	public function update($login, $password){
		$this->setDeslogin($login);
		$this->setDessenha($password);
		$sql = new Sql();
		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()
		));
	}

	public function delete(){
		$sql = new Sql();
		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario()
		));
		$this->setIdusuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());
	}

	public function __construct($login = "", $password = ""){
		$this->setDeslogin($login);
		$this->setDessenha($password);
	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
} 	
```

- Sql.php
```php
<?php 

class Sql extends PDO {

	private $conn;

	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");
	}

	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
```
## CRUD Simples PDO
- usuarios.php
```php
<?php

class Usuarios {

	private $db;

	public function __construct(){

		try {
			$this->db = new PDO("mysql:dbname=mp_pdo_statement;host=localhost", "root", "");
		} catch(PDOException $e){
			echo "ERRO: " . $e->getMessage();
		}
	}

	public function selecionar($id){

		// padrão
		// $sql = "SELECT * FROM usuarios WHERE id = '$id';"
		
		// novo comando usando PDO
		// muito mais seguro, pq ele verifica erros de segurança
		// como SQL Injection por exemplo
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
		/**
		 * no bindValue é como se ele passase a variável por valor
		 * ou seja, uma cópia 
		 */
		$sql->bindValue(":id", $id);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(); // só retorna os dados daquele item especifico
		}

		return $array;
	}

	public function inserir($nome, $email, $senha){

		$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
		/**
		 * No bindParam, ele vai associar/REFERENCIAR o apelido
		 * diretamente com a variável
		 *
		 * é como se fosse um ponteiro em C
		 */
		$sql->bindParam(":nome", $nome);
		$sql->bindParam(":email", $email);
		$sql->bindValue(":senha", MD5($senha));
		
		// se eu mudar o $nome = 'outroNome' por exemplo
		// o bindParam garante que ele vai executar com o valor pela referência
		// lógico, antes de executar o ->execute();
		$sql->execute();
	}

	public function atualizar($nome, $email, $senha, $id){

		$sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
		$sql->execute(array(
			$nome, $email, md5($senha), $id
		));
	}

	public function deletar($id){

		$sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
	}
}
```

- index.php
```php
<?php
require 'usuarios.php';

$u = new Usuarios();
$res = $u->selecionar(1);
$atualizado = $u->atualizar("Galhardo", "galhardo@gmail.com", "123456", 4);
$u->deletar(3);
$u->deletar(2);
print_r($res); // retorna um array com os dados da linha selecionada do banco
```
