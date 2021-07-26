```php

/* http_build_query()
- A função http_build_query()  gera uma url idêntico a uma “QUERY_STRING” a partir do array() passado como primeiro parâmetro.
- O segundo parâmetro é opcional e serve para prefixar índices e valores numéricos em casos onde o array() passado como parâmetro possui índices numéricos.
- O terceiro parâmetro também é opcional, se informado identifica qual será o caracter separador de argumentos na string, por padrão é “&”.
- string http_build_query ( array $formdata [, string $numeric_prefix [, string $arg_separator ]] )
*/
$minhaArray = [
	'nome'   => 'william',
	'codigo' => '1000'
];

$url = http_build_query($minhaArray);

echo $url;
// Imprime nome=william&codigo=1000

$minhaArray = [
	'nome'   => 'william',
	'codigo' => '1000'
];
 
$url = http_build_query($minhaArray);
 
echo $url;
// Imprime nome=william&codigo=1000
