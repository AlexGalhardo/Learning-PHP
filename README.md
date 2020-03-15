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

## Laravel
- [https://laravel.com/docs/7.x](https://laravel.com/docs/7.x)
- <strong>Como MVC Funciona no Laravel</strong>: requisição cliente -> routes/web.php -> app/Http/Controllers/ControladorDaRota.php -> dentro do controller, usamos extends Model (se precisar) -> resources/views/template.blade.php (manda os dados do controller para o view interpretar) -> cliente
- <strong>Lembrando que o Laravel só se apresenta para o público através da pasta "public" por questões óbvias de segurança.</strong>
- Iniciando Projeto
   - $ composer global require laravel/installer
   - $ composer create-project --prefer-dist laravel/laravel project_name (última versão)
   - $ composer create-project --prefer-dist laravel/laravel project_name "6.*" (espeficiar versão do laravel)
   - $ cd project_name && php artisan serve (servidor local do laravel, sem precisar do xampp, etc)
- Comandos Artisan
   - $ php artisan (para ver os todos comandos disponíveis no artisan)
   - $ php artisan make:controller NameController (criar controller)
   - $ php artisan key:generate
   - $ php artisan route:list (verificar todas as rotas criadas automaticamente para o NewController)
   - $ php artisan make:migration create_categories_table (criar table 'categories' no banco de dados) 
   - $ php artisan make:migration teste --create=teste (criar esboço de criação de table 'teste')
   - $ php artisan make:migration teste1 --table=teste1 (criar esboço de ALTER TABLE)
   - $ php artisan migrate:rollback (para voltar todas as migrations feitas)
   - $ php artisan migrate:rollback --step=1 (para voltar a última migration executada)
   - $ php artisan make:migration create_posts_table (criar table 'posts' no banco de dados'
   - $ php artisan migrate:fresh (dropar todas as tables do banco de dados, e migrar todas as tables dentro do projeto)
   - $ php artisan make:controller PostController (criar controller simples chamado Post)
   - $ php artisan make:model Post (criar class do model PostController, na raiz app\Post.php)
   - $ php artisan make:model Product -mcr (criar model Product, migration Product e Product controller de uma vez só)
- Possíveis Erros
   - $ sudo apt install php7.4-mbstring php7.4-xml (algumas extensões necessárias para o laravel)
   - $ sudo subl /opt/lampp/etc/php.ini (tirar ; de extension=php_mbstring.dll e extension=php_xmlrpc.dll)
- Routes/web.php
   - Route::get('listagem-usuario', 'UserController@listUser'); Explicando: usando o método GET para acessar a url https://localhost/laravel/public/listagem-usuario, usando o método listUser do controller UserController 
   - $ php artisan route:list (listar todas as rotas disponíveis na aplicação)
   ```php
    Route::resource('new', 'Form\NewController')
      ->names('users')// troca o nome das rotas new.users, new.store, para users.store
      ->parameters(['new' => 'user']); // troca new/{new} para new/{user}
   ```
   ```php
     app\Providers\AppServiceProvider.php  usar ->
        use Illuminate\Support\Facades\Route;
        public function boot(){
          Route::resourceVerbs([
             "create" => 'novo',
             "edit" => 'editar'
          ]);
        }
        // para editar GET|HEAD  | new/create etc
   ```
- Migrations
   - Depois de configurar o .env com os dados certos do banco de dados e ter criado ele também, executar: $ php artisan migrate
   ```php
     // exemplo de código de database/migrations/~_create_posts_table.php
     <?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     class CreatePostsTable extends Migration
     {
         /**
          * Run the migrations.
          *
          * @return void
          * $ php artisan make:migration create_posts_table
          */
         public function up()
         {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // bigint(20)
            $table->unsignedBigInteger('author'); // unsigned big int
            $table->string('title'); // varchar(255)
            $table->string('slug'); // varchar(255)
            $table->string('subtitle')->nullable(); // text, campo pode ser nulo
            $table->text('content'); // text
            $table->timestamps(); // created_at, updated_at

            // relacionamento com a table user
            // crie uma chave estrangeira para o campo author, 
            // em referencia ao id do user
            $table->foreign('author')->references('id')->on('users')->onDelete('CASCADE');
        });
       }

       /**
        * Reverse the migrations.
        *
        * @return void
        * função de rollback, drop table posts
        */
       public function down()
       {
           Schema::dropIfExists('posts');
       }
   }
   ```

- Controllers
   - $ php artisan make:controller Form\\NewController --resource --model=User (Criar controller no folder app\Http\Controllers\Form com operações CRUD com injeção de dependência do model User)

## Fast HTTP Server

    $ cd project_folder
    $ php -S localhost:8000

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
 - HTTP Servers
    - [XAMPP](https://www.apachefriends.org/index.html)
 - Free Online MySQL 
    - [DB4Free.net](https://db4free.net)
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
 - Asynchronous
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
 - Image Optimization
    - [Squoosh](https://squoosh.app/)
 - Graphics
    - [ChartJS](http://www.chartjs.org/)
 - Public LocalHost
    - [NGrok](https://ngrok.com/)
 - Reset CSS
    - [Normalize.CSS](https://necolas.github.io/normalize.css/)
 - Usefull Plugins Chrome
    - [Window Resizer](https://chrome.google.com/webstore/detail/window-resizer/kkelicaakdanhinjdeammmilcgefonfh?hl=pt-BR)
 - SMTP (Simple Mail Transfer Protocol)
    - [MailGun](https://www.mailgun.com/)
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
    - Tools
       - [Amazon Simple Email Service](https://aws.amazon.com/ses/)
       - [PHP Mailer](https://github.com/PHPMailer/PHPMailer)
       - [MailCatcher](https://mailcatcher.me/)
       - [MailTrap](https://mailtrap.io/)
       - [SendGrid](https://sendgrid.com/)
       - [MailGun](https://www.mailgun.com/)
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

## Configurações | Tutoriais APACHE
 - $ cd /opt/lampp/etc/ && sudo subl php.ini
 - Rename LocalHost
 ```
 $ sudo nano /etc/hosts
 
 127.0.0.1   new_localhost_url_here
 127.0.0.1   new_localhost_url_here
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

## Formulário Validações Sessão Cookies Arquivos
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

