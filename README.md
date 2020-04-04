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

## Fast HTTP Server
    $ cd project_folder
    $ php -S localhost:8000


## Diferença FastCGI, suPHP, CGI, mod_php (DSO) e PHP-FPM
- https://brasilcloud.com.br/duvidas/diferenca-fastcgi-suphp-cgi-mod_php-dso-fpm/
- https://pt.stackoverflow.com/questions/132348/qual-a-diferen%c3%a7a-de-usar-o-php-como-m%c3%b3dulo-do-apache-cgi-fastcgi-e-linha-de-co?answertab=oldest#tab-top
- https://pt.stackoverflow.com/questions/207464/como-funciona-o-php-fpm

<table style="width: 100%;" border="1">
<tbody>
<tr>
<th></th>
<th><strong>mod_php</strong></th>
<th><strong>CGI</strong></th>
<th><strong>suPHP</strong></th>
<th><strong>FastCGI</strong></th>
<th><strong>PHP-FPM</strong></th>
</tr>
<tr>
<th><strong>Uso de memória</strong></th>
<td>Baixo</td>
<td>Baixo</td>
<td>Baixo</td>
<td>Alto</td>
<td>Alto</td>
</tr>
<tr>
<th><strong>Utilização do CPU</strong></th>
<td>Baixo</td>
<td>Alto</td>
<td>Alto</td>
<td>Baixo</td>
<td>Baixo</td>
</tr>
<tr>
<th><strong>Segurança</strong></th>
<td>Baixo</td>
<td>Baixo</td>
<td>Alto</td>
<td>Alto</td>
<td>Alto</td>
</tr>
<tr>
<th><strong>Executar como proprietário do arquivo</strong></th>
<td>Não</td>
<td>Não</td>
<td>Sim</td>
<td>Sim</td>
<td>Sim</td>
</tr>
<tr>
<th><strong>Desempenho Geral</strong></th>
<td>Rápido</td>
<td>Lento</td>
<td>Lento</td>
<td>Rápido</td>
<td>Rápido</td>
</tr>
</tbody>
</table>

## HEADER CONTENT-TYPE JSON Para APIs
- Quando trabalhamos com APIs devemos sempre informar os cabeçalhos corretos dos retornos das requisições.
- Frameworks como Laravel e Synfony já fazem boa parte do trabalho para nós, mas se estivermos desenvolvendo scripts php sem nenhuma ferramenta auxiliar como estas, devemos cuidar estes detalhes.

- HEADER CONTENT-TYPE
   - Para informar para a aplicação que está consumindo nosso script que o retorno é no formato JSON, devemos usar a função header do PHP juntamente com o valor Content-Type, como no exemplo abaixo:
   - No mesmo valor de Content-Type informamos também que os dados são codificados em utf-8, para evitar erros de acentos e outros caracteres.
```php
$return = ['status' => 'ok'];

header('Content-Type: application/json;charset=utf-8');
echo json_encode($return); die;
```
   
## CORS 
- Referências:
   - https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Controle_Acesso_CORS
- Aplicado no PHP
   ```php
   <?php
   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: GET, POST');
   header("Access-Control-Allow-Headers: X-Requested-With");
   ```

## Deploy Laravel UpInside
- Deploy Servidor Compartilhado: https://www.youtube.com/watch?v=fkwhtu0H5EU
- Deploy Servidor Privado: https://www.youtube.com/watch?v=bcjlZl9F0dU
- Instalar LAMPP Linha de Comando: https://github.com/teddysun/lamp
- $ wget https://getcomposer.org/installer
- $ php installer
- $ php composer.phar install_composer
- CTRL + W para buscar dentro do nano e editar o php.init
- Reiniciar Apache: $ /etc/init.d/httpd restart 
- $ rm -rf folder (recursive forced)
- Apontar para a public do laravel: $ ln -s laraveltips/public default
- $ find * -type d -exec chmod 775 {} \\; (permissões diretórios)
- $ find * -type f -exec chmod 644 {} \\; (permissões arquivos)

## Kill Process Using Port 80
- https://unix.stackexchange.com/questions/244531/kill-process-running-on-port-80
- There are several ways to find which running process is using a port.
- Using fuser it will give the PID(s) of the multiple instances associated with the listening port.
- $ sudo apt-get install psmisc
- $ sudo fuser 80/tcp
   - 80/tcp:               1858  1867  1868  1869  1871
- After finding out, you can either stop or kill the process(es).
- You can also find the PIDs and more details using lsof
   - $ sudo lsof -i tcp:80 
- To limit to sockets that listen on port 80 (as opposed to clients that connect to port 80):
   - sudo lsof -i tcp:80 -s tcp:listen
- To kill them automatically:
   - sudo lsof -t -i tcp:80 -s tcp:listen | sudo xargs kill


## Docker
- https://laradock.io/
- https://github.com/laradock/laradock
- https://hub.docker.com/
   - https://docs.docker.com/install/linux/docker-ce/ubuntu/


## APACHE
 - $ cd /opt/lampp/etc/ && sudo subl php.ini (editar arquivo php.ini)
 - Rename LocalHost
    - $ sudo nano /etc/hosts
    - 127.0.0.1   new_localhost_url_here
    - 127.0.0.1   new_localhost_url_here


## CHMOD
```
- Change Mode Command
    ```
    Permissão Binário   Octal
    ---        000       0
    --x        001       1
    -w-        010       2
    -wx        011       3
    r--        100       4
    r-x        101       5
    rw-        110       6
    rwx        111       7

    x -> execute 
    w -> write
    r -> read

    owner  group  general  unix command      -> quando usar
    ---   ---     ---
    rwx   rwx     rwx 
    421   401     401      sudo chmod 755   -> diretórios em produção
    420   400     400      sudo chmod 644   -> arquivos em produção
    ```
 - Dar todas permissões arquivos e diretórios de forma recursiva
    ```
    $ sudo chmod -R 755 folder/
```


## PHP.INI
- date.timezone=America/Sao_Paulo
- memory_limit=512M
- error_reporting=E_ALL
- extension=php_openssl.dll
- extension=php_pdo_pgsql.dll
- extension=php_pdo_mysql.dll
- display_errors=On

## Windows
- C:\xampp\php\php.ini
- C:\xampp\apache\conf\httpd.config
- Caminho correto da pasta ssl.crt no windows usando o xampp c:\xamp\apache\conf

## XDebug
 - https://xdebug.org/wizard
 - $ sudo apt install php-dev
 - Copiar arquivos: http://localhost/dashboard/phpinfo.php CTRL+A dentro do site
 - Seguir as intruções do site, exemplo:
 ```
 Instructions
 Download xdebug-2.9.3.tgz
 Install the pre-requisites for compiling PHP extensions.
 On your Ubuntu system, install them with: apt-get install php-dev autoconf automake
 Unpack the downloaded file with tar -xvzf xdebug-2.9.3.tgz
 Run: cd xdebug-2.9.3
 Run: phpize (See the FAQ if you don't have phpize).

 As part of its output it should show:

 Configuring for:
 ...
 Zend Module Api No:      20190902
 Zend Extension Api No:   320190902
 If it does not, you are using the wrong phpize. Please follow this 
 FAQ entry and skip the next step.

 Run: ./configure
 Run: make
 Run: cp modules/xdebug.so /opt/lampp/lib/php/extensions/no-debug-non-zts-20190902
 Edit /opt/lampp/etc/php.ini and add the line
 zend_extension = /opt/lampp/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so
 Restart the webserver
 ```

## Certificado SSL LocalHost
- Enviar arquivos para dentro do servidor
   - sudo cp localhost.crt /opt/lampp/etc/ssl.crt
- Editar httpd-ssql.conf
   - /opt/lampp/etc/extra$ sudo subl httpd-ssl.conf
   ```
    #   Server Certificate:
    #   Point SSLCertificateFile at a PEM encoded certificate.  If
    #   the certificate is encrypted, then you will be prompted for a
    #   pass phrase.  Note that a kill -HUP will prompt again.  Keep
    #   in mind that if you have both an RSA and a DSA certificate you
    #   can configure both in parallel (to also allow the use of DSA
    #   ciphers, etc.)
    #   Some ECC cipher suites (http://www.ietf.org/rfc/rfc4492.txt)
    #   require an ECC certificate which can also be configured in
    #   parallel.
    SSLCertificateFile "/opt/lampp/etc/ssl.crt/localhost.crt"
    #SSLCertificateFile "/opt/lampp/etc/server-dsa.crt"
    #SSLCertificateFile "/opt/lampp/etc/server-ecc.crt"

    #   Server Private Key:
    #   If the key is not combined with the certificate, use this
    #   directive to point at the key file.  Keep in mind that if
    #   you've both a RSA and a DSA private key you can configure
    #   both in parallel (to also allow the use of DSA ciphers, etc.)
    #   ECC keys, when in use, can also be configured in parallel
    SSLCertificateKeyFile "/opt/lampp/etc/ssl.crt/localhost.key"
    #SSLCertificateKeyFile "/opt/lampp/etc/server-dsa.key"
    #SSLCertificateKeyFile "/opt/lampp/etc/server-ecc.key"
   ```

## SSH Keys

- Follow these instructions to create or add SSH keys on Linux, MacOS & Windows. Windows users without OpenSSH can install and use PuTTY instead.
- Create a new key pair, if needed
- Open a terminal and run the following command:
   - $ ssh-keygen
- You will be prompted to save and name the key.
- Generating public/private rsa key pair. Enter file in which to save the key (/Users/USER/.ssh/id_rsa): 
- Next you will be asked to create and confirm a passphrase for the key (highly recommended):
   - $ Enter passphrase (empty for no passphrase):
   - $ Enter same passphrase again: 
- This will generate two files, by default called id_rsa and id_rsa.pub. Next, add this public key.
- Add the public key
- Copy and paste the contents of the .pub.pub file, typically id_rsa.pub, into the SSH key content field on the left.
   - $ cat ~/.ssh/id_rsa.pub

## PostgreSQL
- Curso Online Grátis: Conceitos e melhores práticas com bancos de dados PostgreSQL => https://web.digitalinnovation.one/course/conceitos-e-melhores-praticas-com-bancos-de-dados-postgresql/learning/83cbc77b-5abe-4a19-bcba-5ccc0baa502d
- Oificla Site: https://www.postgresql.org/
- Install Ubuntu APT: https://wiki.postgresql.org/wiki/Apt
- Oficial Documentation: https://www.postgresql.org/docs/manuals/
- PGAdmin Site: https://www.pgadmin.org/
- PGAdmin GUI: http://127.0.0.1:42205/browser/
- $ pgadmin4 (start)

## Ferramentas 

- HTTP Servers
    - [XAMPP](https://www.apachefriends.org/index.html)
    - [Nginx](https://www.nginx.com/)
- Free Online MySQL 
    - [DB4Free.net](https://db4free.net)
- Deploy
    - https://deployer.org/
- GitHub
    - https://dillinger.io/
    - http://gitignore.io/
- [cPanel](https://cpanel.com/)
    - cPanel: 2082
    - cPanel  HTTPS: 2083
    - WHM: 2086
    - WHM HTTPS: 2087
    - Webmail: 2095
    - Webmail  HTTPS: 2096
 - FTP (File Transfer Protocol)
    - Default Port: 21
    - Webdisk: 2077
    - Webdisk HTTPS: 2078
    - [FileZilla](https://filezilla-project.org/)
 - PHP Asynchronous
    - [ReactPHP](https://reactphp.org/)
 - REST APIs
    - [REST TestTest](https://resttesttest.com/)
    - [Insomnia](https://insomnia.rest/)
    - [Postman](https://www.getpostman.com/)
 - Benchmark
    - [PHPBench](https://phpbench.com/)
 - Open Source Forum
    - [Flarum](https://github.com/flarum/flarum)
 - Insights
    - [New Relic](https://newrelic.com/)
 - Perfomance
    - [Amazon CloudFront](https://aws.amazon.com/cloudfront)
    - [MemCachier](https://www.memcachier.com/)
    - [Fastly](https://www.fastly.com/)
 - Code Quality
    - [CodeClimate](https://codeclimate.com/)
 - DataBase as a Service
    - [OpenRedis](https://openredis.com/)
    - [Heroku PostgreSQL](https://www.heroku.com/postgres)
 - Documentation 
    - [PHPDoc](https://www.phpdoc.org/)
 - Pagamentos
    - [Pagar.me](https://pagar.me/)
    - [Boleto PHP](https://boletophp.com.br/)
    - [GerenciaNet](https://gerencianet.com.br/)
    - [StripePHP](https://packagist.org/packages/stripe/stripe-php)
    - [PayPal PHP](https://packagist.org/packages/paypal/rest-api-sdk-php)
 - Image Optimization
    - [Squoosh](https://squoosh.app/)
 - Graphics
    - [ChartJS](http://www.chartjs.org/)
 - Public LocalHost
    - [NGrok](https://ngrok.com/)
 - Reset CSS
    - [Normalize.CSS](https://necolas.github.io/normalize.css/)
 - CEP
    - [ViaCEP](http://viacep.com.br/)
 - PDF
    - [mPDF](https://mpdf.github.io/)
 - JSON
    - [JSONEditorOnline.org](http://jsoneditoronline.org/)
 - Monitoring Server
    - [UpTime Robot](https://uptimerobot.com/)
 - Testing
    - [PHP Unit](https://phpunit.de/)
    - [XDebug](https://github.com/xdebug/xdebug)
    - [BlackFire](https://blackfire.io/)
 - Security
    - [Security Sensio Labs](https://security.sensiolabs.org/)
 - Interaction controls to your HTML tables
    - [DataTables.net](https://datatables.net/)
 - BarCode Generator
    - [Picqer](https://github.com/picqer/php-barcode-generator)
 - Plugins Chrome
    - [Window Resizer](https://chrome.google.com/webstore/detail/window-resizer/kkelicaakdanhinjdeammmilcgefonfh?hl=pt-BR)
 - SMTP (Simple Mail Transfer Protocol)
    - [MailGun](https://www.mailgun.com/)
    - [SendGrid](https://sendgrid.com/)
    - [Amazon Simple Email Service](https://aws.amazon.com/ses/)
    - [PHP Mailer](https://github.com/PHPMailer/PHPMailer)
    - [MailCatcher](https://mailcatcher.me/)
    - [MailTrap](https://mailtrap.io/)
    - [SendGrid](https://sendgrid.com/)
    - SMTP Gmail
       - Nome do servidor SMTP Gmail: smtp.gmail.com
       - Usuario SMTP Gmail: o seu endereço Gmail
       - Password SMTP Gmail: a sua password
       - Porta SMTP do Gmail (TLS): 587.
       - Porta SMTP do Gmail (SSL): 465.
    - "Protocolo de transferência de correio simples" 
    é o protocolo padrão para envio de e-mails através da Internet, definido na RFC 821.
    - É um protocolo relativamente simples, em texto plano, onde um ou vários destinatários de uma mensagem 
    são especificados (e, na maioria dos casos, validados) sendo, depois, a mensagem transferida.
    - SMTP: Port 587
    - SMTP + SSL: Port 465
    - SMTP + TLS: Port 587 (recomendado)
 - POP3 == Post Office Protocol. 
    - O POP3 permite que um cliente faça download de um e-mail de um servidor de e-mail. 
    - O protocolo POP3 é simples e não oferece muitos recursos, excepto para download. 
    - O seu conceito pressupõe que o cliente de e-mail faça download de todo o e-mail disponível no servidor, apaga-os do servidor e, em seguida, desliga-se. 
    - Ao utilizar este procolo, irá conseguir visualizar os seus emails caso não tenha acesso à Internet.
    - POP3: Port 110
    - POP3  + SSL: Port 995
    - POP3 + TLS: Port 110 (recomendado)
 - IMAP == Internet Message Access Protocol. 
    - O IMAP partilha muitos recursos semelhantes com o POP3.  
    Também é um protocolo que um cliente de e-mail pode usar para fazer download de e-mails de um servidor de e-mail. No entanto, o IMAP inclui mais recursos do que POP3. 
    - O protocolo IMAP foi desenvolvido para permitir que os utilizadores mantenham seus e-mails no servidor. 
    - O IMAP requer mais espaço em disco no servidor e no geral mais recursos de servidor do que POP3, já que todos os e-mails são armazenados no servidor. 
    - Ao utilizar este procolo, apenas irá conseguir visualizar os seus emails, caso não tenha acesso à Internet, se o seu cliente de e-mail estiver configurado especificamente para tal.
    - IMAP: Port 143
    - IMAP + SSL: Port 993
    - IMAP + TLS: Port 143 (recomendado)
 - Completely Uninstall LAMP Ubuntu 18.04 LTS
    ```sh
    #!/bin/bash

    # This will remove Apache
    sudo service apache2 stop
    sudo apt-get purge apache2 apache2-utils apache2.2-bin apache2-common
    sudo apt remove apache2.*
    sudo apt-get autoremove
    whereis apache2
    sudo rm -rf /etc/apache2

    # This will remove PHP
    sudo apt-get purge `dpkg -l | grep php7.2| awk '{print $2}' |tr "\n" " "`
    sudo apt-get purge php7.*
    sudo apt-get autoremove --purge
    whereis php
    sudo rm -rf /etc/php

    # This will remove MYSql
    sudo service mysql stop
    sudo apt-get remove --purge *mysql\*
    sudo apt-get remove --purge mysql-server mysql-client mysql-common -y
    rm -rf /etc/mysql
    sudo apt-get autoremove
    sudo apt-get autoclean

    sudo reboot
    ```
    
## .htaccess
    RewriteEngine On
    Options All -Indexes

    # ROUTER WWW Redirect.
    # RewriteCond %{HTTP_HOST} !^www\. [NC]
    # RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # ROUTER HTTPS Redirect
    # RewriteCond %{HTTP:X-Forwarded-Proto} !https
    # RewriteCond %{HTTPS} off
    # RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # ROUTER URL Rewrite
    RewriteCond %{SCRIPT_FILENAME} !-f
    RewriteCond %{SCRIPT_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?route=/$1 [L,QSA]

## CURL
- Referências
   - https://codecommit.com.br/curl-tutorial-basico-comandos-basicos

- O cURL é uma ferramenta de linha de comando ou biblioteca para realizar transferencia de informações com URLs.
- Ele suporta diversos tipos de transferência, como HTTP, HTTPS, IMAP, FTP, SFTP, IMAP, SCP, SMTP, Telnet e diversos outros protocolos utilizados pelo mercado.
- A grande maioria das linguagens de programação tem suporte nativo ao cURL, pela sua grande usabilidade.

- USO BÁSICO - GET
   - Fazendo uma requisição GET para uma URL específica
      - curl https://url.com.br/
   - Incluindo informações de HTTP-Header no retorno
      - curl --include https://url.com.br/

- AUTENTICAÇÃO DE USUÁRIO
   - Informando apenas um usuário (o cURL pede a senha em seguida, ideal para ser usado em scripts e não armazenar senhas)
      - curl --user "usuario" https://url.com.br/
   - Informando usuário e senha
      - curl --user "usuario:senha" https://url.com.br/
- POST
   - Use a flag --request (-X) juntamente com a flag --data (-d) para realizar uma requisição do tipo POST
      - curl --request POST --data 'success=true' https://url.com.br/
   - Sempre que a flag --data for informada o cURL irá assumir que a requisição é to tipo POST
      - curl --data 'success=true' https://url.com.br/
   - A informação do POST pode ser informada como em uma URL
      - curl --request POST --data 'success=true&alert=true&status=2' https://url.com.br/
   - Você pode informar um arquivo para que as informações do POST sejam lidas
      - curl --data @data.txt https://url.com.br/

- HEADERS
   - As vezes você precisa informar algum cabeçalho na requisição
      - curl -H 'Content-Type: application/json' -H 'Authentication: f536bc365bc53cf366c3fbc36b5f3' --data 'success=true' https://url.com.br/
      
- HTTPS
   - Você pode pedir para o cURL ignorar o HTTPS passando a flag --insecure. Esta flag deve ser usada com cuidado, pois pode gerar insegurança nas requisições.
      - curl --insecure https://url.com.br/

## cURL PHP
- https://imasters.com.br/back-end/curl-com-php-para-apis-restfull
- https://www.codigomaster.com.br/desenvolvimento/utilizando-curl-com-php/
- https://codecommit.com.br/curl-com-php
- http://rberaldo.com.br/trabalhando-com-a-biblioteca-curl/

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
- Exemplo:
```php
// Cria o cURL
$curl = curl_init();
// Seta algumas opções
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'http://exemplo.com.br',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        item1 => 'valor',
        item2 => 'valor'
    ]
]);
// Envia a requisição e salva a resposta
$response = curl_exec($curl);
// Fecha a requisição e limpa a memória
curl_close($curl);
```
- ERROS
   - É importante sempre tratar possíveis erros que aconteçam na requisição. Para isso existem duas funções do cURL:
      - curl_error() - Retorna uma string com uma mensagem de erro, se a string estiver em branco, nenhum erro aconteceu
      - curl_errno() - Retorna um código de erro

## Comandos Rápidos MySQL
- Referências:
   - https://www.mysqltutorial.org/mysql-cheat-sheet/
- COMANDOS DE SERVIDOR
   - Em um servidor Linux você pode utilizar os comandos a seguir para se conectar no cliente local do MySQL:
      - mysql -u [usuario] -p; // Conecta no cliente MySQL com o usuário informado
      - mysql -u [usuario] -p [banco]; // Conecta no cliente MySQL e em um banco especificado
      - mysqldump -u [usuario] -p [banco] > backup.sql; // Exporta os dados do banco para o arquivo especificado 
   - COMANDOS PARA BANCOS DE DADOS
      - CREATE DATABASE [IF NOT EXISTS] banco; // Cria um banco, se já não existir um com este nome
      - USE database_name; // Seleciona um banco ou troca o banco já selecionado para um novo
      - DROP DATABASE [IF EXISTS] banco; // Remove um banco e todos seus arquivos físicos
      - SHOW DATABASES;
    - TRABALHANDO COM TABELAS
      - show tables; // Lista todas tabelas disponíveis no banco selecionado
      - CREATE [TEMPORARY] TABLE [IF NOT EXISTS] tabela( coluna tipo(tamanho) NOT NULL ); // Cria uma nova tabela - Leia mais sobre o comando CREATE TABLE
      - DROP TABLE [IF EXISTS] table // Remove uma tabela - Saiba mais
      - TRUNCATE TABLE table // Limpa o conteúdo de uma tabela 
      - DESCRIBE table  //  Fornece informações de uma tabela ou colunas
   - ALTERANDO A ESTRUTURA DE UMA TABELA
      - ALTER TABLE table ADD [coluna]; // Adiciona uma nova coluna
      - ALTER TABLE table DROP [coluna]; // Remove uma coluna
      - ALTER TABLE table ADD INDEX [nome](coluna, ...); // Adiciona um índice (index) a tabela
      - ALTER TABLE table ADD PRIMARY KEY (column,...) // Adiciona uma chave primária (primary key)
      - ALTER TABLE table DROP PRIMARY KEY // Remove uma chave primária
   - TRABALHANDO COM ÍNDICES (INDEX)
      - CREATE [UNIQUE|FULLTEXT] INDEX indice ON tabela (coluna,...) // Cria um novo índice
      - DROP INDEX indice // Remove um índice
   - CONSULTANDO INFORMAÇÕES
      - SELECT * FROM tabela // Busca todos os campos de uma tabela
      - SELECT coluna1, coluna2 FROM tabela // Busca colunas específicas de uma tabela
      - SELECT DISTINCT (coluna) FROM tabela //Busca apenas informações únicas
      - SELECT * FROM tabela WHERE condicao // Filtra a busca pelos parâmetros informados
      - SELECT coluna1 AS coluna_nova FROM tabela // Retorna a informação de uma coluna utilizando um "apelido" para a mesma
      - SELECT * FROM tabela1 INNER JOIN tabela2 ON codicoes // Busca informações de múltiplas tabelas utilizando o parâmetro JOIN
      - SELECT COUNT (*) FROM tabela // Conta as linhas encontradas na consulta
      - SELECT * FROM tabela ORDER BY coluna [DESC,ASC]  // Ordena os resultados da busca
      - SELECT * FROM tabela GROUP BY coluna // Agrupa os resultados de uma busca
   - INSERINDO INFORMAÇÕES
      - INSERT INTO tabela (coluna1,...) VALUES (valor1,...); // Insere um novo registro na tabela
      - INSERT INTO tabela (coluna1,...) VALUES (valor1,...), (valor1,...), (valor1,...); // Insere múltiplos valores em uma tabela
   - ATUALIZANDO INFORMAÇÕES
      - UPDATE tabela SET coluna1 = valor1, ... // Atualiza os valores de uma tabela
      - UPDATE tabela SET coluna1 = valor1 WHERE condicao // Atualiza os valores de registros que sejam especificados pela condição WHERE
   - DELETANDO INFORMAÇÕES
      - DELETE FROM tabela; // Deleta todas linhas de uma tabela
   - DELETE FROM tabela WHERE condicao;
      - Deleta as linhas especificadas pela condição
   - PESQUISANDO INFORMAÇÕES
      - SELECT * FROM tabela WHERE coluna LIKE '%valor%' // Pesquisa por informações utilizando o operador LIKE
  - SELECT * FROM tabela WHERE coluna RLIKE 'expressao_regular'
      - Pesquisa por informações utilizando uma expressão regular

## DUMP MYSQL
- O MySQL disponibiliza uma ferramenta simples para exportar bancos de dados diretamente no servidor, o mysqldump. Com essa ferramenta você pode fazer dumps de bancos rodando no servidor local ou exportar bancos para outros servidores diretamente. 
- O arquivo exportado contém uma série de comandos e parametros SQL para a criação e importação dos dados.
- FAZENDO O BACKUP DE UM BANCO MYSQL
   - Para utilizar o mysqldump para realizar o backup você precisa ter acesso ao servidor que o serviço está rodando.      - Este acesso pode ser feito por SSH, caso você tenha as credenciais. Após o acesso, você pode usar o comando a seguir:
      - mysqldump -u [usuario] –p [banco] > [arquivo.sql]
   - Os parâmetros utilizados no comando acima são os seguintes:
      - [usuario] - Nome de usuário com acessos ao banco
      - [banco] - Nome do banco de dados
      - [arquivo.sql] - Nome do arquivo do dump
   - EXPORTAR APENAS A ESTRUTURA DO BANCO
   - Se você deseja apenas exportar a estrutura do banco, se informações, basta adicionar o comando --no-data, como no exemplo:
      - mysqldump -u [usuario] –p --no-data [banco] > [arquivo.sql]
   - EXPORTAR APENAS AS INFORMAÇÕES
   - Se você deseja exportar apenas as informações do banco, sem a estrutura, basta adicionar o comando --no-create-info, como no exemplo a seguir:

      - mysqldump -u [usuario] –p --no-create-info [banco] > [arquivo.sql]
   - EXPORTAR DIVERSOS BANCOS PARA UM ÚNICO ARQUIVO
   - Você pode passar como parâmetro diversos bancos de dados para serem exportados para um único arquivo:
      - mysqldump -u [usuario] –p [banco1, banco2, ...] > [arquivo.sql]
      - mysqldump -u [usuario] –p --all-databases > [arquivo.sql]
