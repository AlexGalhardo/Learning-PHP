## DATETIME & TIMESTAMPS
- A maior diferença entre datetime e timestamp é a seguinte:
   - datetime: representa uma data como no calendário e a hora como encontrado no relógio.
    - timestamp: representa um ponto específico na linha do tempo e leva em consideração o fuso horário em questão (UTC). 
    - Por exemplo: quando foi 26/02/2015 16:40? depende, para mim é nesse momento, para o Japão foi a várias horas atrás, então basicamente o timestamp leva em consideração essas questões de fuso horário.
    - Outro ponto é que geralmente quando se precisa rastrear alterações feitas em registros da base de dados, opta-se pelo uso do timestamp pois permite o detalhamento perante a linha do tempo real.
```php
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
```
- ![tabela-date](https://user-images.githubusercontent.com/19540357/81638691-4f4b7200-93f0-11ea-8bff-96c8d1ed8ad9.jpg)

- date()
   - A função date() é uma verdadeira mão na roda, por padrão ela recebe um parâmetro string com formato que queremos formatar data e hora local e retorna uma string.
   - Mas se passarmos um segundo parâmetro com valor timestamp, esse valor será formatado.
```php
echo date('d/m/Y');
// Imprime a data atual 21/10/2017
 
echo date('Y');
// Imprime somente o ano atual 2017
 
$minha_data = '2017-10-21 10:30:00';
 
echo date('H:i:s', strtotime($minha_data ));
// Imprime somente a hora/minuto/segundo da varável $minha_data 10:30:00
 
echo date('d/m/Y', strtotime($minha_data ));
// Imprime somente a data da varável $minha_data com barras 21/10/2017
```
- strtotime()
   - A função strtotime() retorna um valor timestamp no sucesso ou valor booleano “false” em caso de falha, ela traz algumas variações no primeiro parâmetro que acabam passando uma impressão de complexidade para ser usada.
   - Essa função recebe uma string no primeiro parâmetro contendo data/hora, os valores aceitos estão explicados em Formatos Data e Hora.
   - O segundo parâmetro é opcional e pode ser um timestamp que será usado para calcular a data com base no primeiro parâmetro.
```php
$minha_data = '2017-10-21 10:30:00';
 
// Adiciona 1 dia na variável $minha_data
$timestamp = strtotime('+1 day', strtotime($minha_data));
 
// Imprime 22/10/2017
echo date('d/m/Y', $timestamp);
 
$timestamp = strtotime('+1 hour', strtotime($minha_data));
// Adiciona 1 hora na variável $minha_data
 
echo date('H:i:s', $timestamp);
// Imprime 11:30:00
```
- date_parse()
   - A função date_parse() retorna um array() associativo contendo informações detalhadas sobre a data e hora passadas como parâmetro, caso ocorra um erro será retornado um valor booleano “false”.
```php
$minha_data = '2017-10-21 10:30:00';
 
// Exibe informações sobre a data passada como parâmetro
var_dump(date_parse($minha_data));
 
array(12) {
  ["year"]=>
  int(2017)
  ["month"]=>
  int(10)
  ["day"]=>
  int(21)
  ["hour"]=>
  int(10)
  ["minute"]=>
  int(30)
  ["second"]=>
  int()
  ["fraction"]=>
  float()
  ["warning_count"]=>
  int()
  ["warnings"]=>
  array() {
  }
  ["error_count"]=>
  int()
  ["errors"]=>
  array() {
  }
  ["is_localtime"]=>
  bool(false)
}
```
- checkdate()
   - A função checkdate() retorna uma valor booleano se a data passada como parâmetro for válida no calendário “Gregoriano”.
```php
// Data válida retorna TRUE
var_dump(checkdate(12, 25, 2017));
//Imprime bool(true) 
 
 
// Data inválida retorna FALSE
var_dump(checkdate(2, 30, 2017));
// Imprime bool(false) 
```

- getdate()
   - A função getdate() retorna um array() associativo com informações a partir do parâmetro “timestamp” que é informado na função.
```php
$minha_data = '2017-10-21 10:30:00';
 
// Converte a data em timestamp
$timestamp = strtotime($minha_data);
 
// Exibe informações sobre o timestamp passado como parâmetro
var_dump(getdate($timestamp));
 
array(11) {
  ["seconds"]=>
  int()
  ["minutes"]=>
  int(30)
  ["hours"]=>
  int(10)
  ["mday"]=>
  int(21)
  ["wday"]=>
  int(6)
  ["mon"]=>
  int(10)
  ["year"]=>
  int(2017)
  ["yday"]=>
  int(293)
  ["weekday"]=>
  string(8) "Saturday"
  ["month"]=>
  string(7) "October"
  []=>
  int(1508574600)
}
```
- DateTime PHPDica Bônus
   - Apesar do PHP possuir diversas funções para se trabalhar com data e hora, ainda podemos usar um pouco de orientação a objetos com a classe DateTime() que implementa a interface “DateTimeInterface”.
   - A classe “DateTime()” possui alguns métodos que também ajudam na manipulação de data e hora no PHP, basta instanciar um objeto e começar a usar como nos exemplos abaixo:
- DateTime::add()
```php
$minha_data = '2017-10-21';
 
// Instância um objeto DateTime passando uma data como parâmetro
$date = new DateTime($minha_data);
 
// Adicionar 10 dias na data passada no construtor
$date->add(new DateInterval('P10D'));
 
// Exibe a nova data
echo $date->format('Y-m-d');
// Imprime 2017-10-31
```
- DateTime::format()
```php
$minha_data = '2017-10-21 10:30:00';
 
// Instância um objeto DateTime passando uma data como parâmetro
$date = new DateTime($minha_data);
 
// Formata a data para exibição
echo $date->format('d/m/Y H:i:s');
// Imprime 21/10/2017 10:30:00
```
- DateTime::diff()
```php
$minha_data1 = '2017-10-21';
$minha_data2 = '2017-12-25';
 
// Instância um objeto DateTime passando a data 1
$datetime1 = new DateTime($minha_data1);
 
// Instância um objeto DateTime passando a data 2
$datetime2 = new DateTime($minha_data2);
 
// Captura a diferença entre a data 1 e a data 2
$interval = $datetime1->diff($datetime2);
 
// Exibe a diferenças em dias
echo $interval->format('%R%a dias');
// Imprime +65 dias
```