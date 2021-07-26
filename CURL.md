```php
/*
- Inicializando curl
   - $curl = curl_init($url);
- Para informarmos um parametro devemos utilizar a função 
   - `curl_setopt()` 
   - bool curl_setopt ( resource $ch , int $option , mixed $value )
      - ch, um handle cURL retornado por curl_init().
      - option, que possui várias opções do tipo CURLOPT, como por exemplo, CURLOPT_URL, que vamos utilizar em nosso primeiro exemplo.
      - value, o valor a ser definido no parâmetro option, neste caso, nossa URL.
   
- E caso necessário podemos informar mais de um parametro utilizando a função `curl_setopt_array()`
   - `CURLOPT_RETURNTRANSFER` – Retorna uma string
   - `CURLOPT_CONNECTTIMEOUT` – Segundos tentando conectar até o timeout
   - `CURLOPT_TIMEOUT` – Segundos limite para execução do cURL
   - `CURLOPT_USERAGENT` – String contendo um user-agent
   - `CURLOPT_URL` – URL – enviar a requisição
   - `CURLOPT_PORT` – Informe de porta
   - `CURLOPT_HTTPHEADER` – Cabeçalhos da requisição
   - `CURLOPT_POST` – Envia a requisição como POST
   - `CURLOPT_POSTFIELDS` – Array de informações enviadas como POST
      - curl_setopt($cr, CURLOPT_POSTFIELDS, "cliente=1&nome=alex");
-  Envio e armazenamento da resposta
   - $response = curl_exec($curl);
- Fecha e limpa recursos
   - curl_close($curl);
*/
   
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'http://exemplo.com.br',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        item1 => 'valor',
        item2 => 'valor'
    ]
]);
$response = curl_exec($curl);
curl_close($curl);

/*
- ERROS
   - É importante sempre tratar possíveis erros que aconteçam na requisição. Para isso existem duas funções do cURL:
      - curl_error() - Retorna uma string com uma mensagem de erro, se a string estiver em branco, nenhum erro aconteceu
      - curl_errno() - Retorna um código de erro

## GUZZLE HTTP LIB
- http://docs.guzzlephp.org/en/stable/index.html
- GET example
*/

$client = new Client([
     'verify' => false,
     'base_uri' => 'https://localhost/app/api/books',
     'timeout'  => 2.0,
 ]);
 $params = [
    'query' => [
       'token' => 999,
    ]
 ];

 $response = $client->request('GET', 'https://localhost/app/api/books', [
                         'query' => 'token=999']);

 if ($response->getBody()) {
     echo $response->getBody();
 }

$client = new Client([
     'verify' => false, // verify ssl?
     'base_uri' => 'https://localhost/app/api/book/create?token=999',
     'timeout'  => 2.0,
 ]);

 $response = $client->request('POST', 'https://localhost/app/api/book/create?token=999', [
     'form_params' => [
         "title" => 'new book curl',
         "publisher" => 'new book curl publisher',
         "author" => 'new book curl author',
         "isbn" => 898912,
         "pages" => 999,
         "year" => 2030, 
         "category" => 1,
     ]
 ]);
 if ($response->getBody()) {
     echo $response->getBody();
 }
