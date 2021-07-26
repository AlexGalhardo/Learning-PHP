## Composer
- https://getcomposer.org
- https://packagist.org
- https://composer.json.jolicode.com/
- https://www.toptal.com/developers/gitignore
- https://getcomposer.org/schema.json
- $ sudo apt install composer
- $ composer
- $ composer init
- $ composer install
- $ composer update
- $ composer clearcache
- $ composer dumpautoload

## Composer Libs
- https://reactphp.org/
- https://packagist.org/packages/google/apiclient
- https://packagist.org/packages/coffeecode/
- https://packagist.org/packages/phpmailer/phpmailer
- https://packagist.org/packages/league/plates
- https://packagist.org/packages/league/oauth2-google
- https://packagist.org/packages/league/oauth2-facebook
- https://packagist.org/packages/league/oauth2-github
- https://packagist.org/packages/league/oauth2-linkedin
- https://packagist.org/packages/league/oauth2-instagram
- https://packagist.org/packages/matthiasmullie/minify
- https://packagist.org/packages/monolog/monolog
- https://packagist.org/packages/fabpot/goutte
- https://packagist.org/packages/paquettg/php-html-parser
- https://packagist.org/packages/guzzlehttp/guzzle
- https://packagist.org/packages/fzaninotto/faker
- https://packagist.org/packages/respect/validation
- https://packagist.org/packages/stichoza/google-translate-php
- https://packagist.org/packages/intervention/image
- https://packagist.org/packages/stefangabos/zebra_image
- https://packagist.org/packages/sinergi/browser-detector
- https://packagist.org/packages/cocur/slugify
- https://packagist.org/packages/phpunit/phpunit
- https://packagist.org/packages/clancats/hydrahon
- https://packagist.org/packages/dompdf/dompdf
- https://packagist.org/packages/stripe/stripe-php
- https://packagist.org/packages/pagarme/pagarme-php
- https://packagist.org/packages/lcobucci/jwt
- https://packagist.org/packages/psr/log
- https://packagist.org/packages/egulias/email-validator
- https://packagist.org/packages/vlucas/phpdotenv
- https://packagist.org/packages/league/flysystem
- https://packagist.org/packages/psr/http-message
- https://packagist.org/packages/webmozart/assert
- https://packagist.org/packages/phpunit/php-timer
- https://packagist.org/packages/nikic/php-parser
- https://packagist.org/packages/psr/simple-cache
- https://github.com/serbanghita/Mobile-Detect
- https://github.com/filp/whoops
- https://github.com/octobercms/october
- https://github.com/walkor/Workerman
- https://github.com/php-ai/php-ml
- https://github.com/swiftmailer/swiftmailer
- https://github.com/php-pm/php-pm
- https://github.com/nrk/predis
- https://github.com/mledoze/countries
- https://github.com/PHPOffice/PHPWord
 
## Composer Errors
- Cannot create cache directory /home/<user>/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache
   - $ sudo chown -R $USER $HOME/.composer
- Do not run Composer as root/super user! See https://getcomposer.org/root for details
- How do I install untrusted packages safely? Is it safe to run Composer as superuser or root?#
   - $ composer install --no-plugins --no-scripts ...
   - $ composer update --no-plugins --no-scripts ...

## composer.json example
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
            "App\\": "app"
        },
        "files": [
            "app/Config.php",
            "app/Helpers.php"
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
        "league/oauth2-github": "^2.0",
        "matthiasmullie/minify": "1.3.61",
        "rahimi/monolog-telegram": "^1.0",
        "cocur/slugify": "^4.0",
        "pagarme/pagarme-php": "^4.0",
        "stripe/stripe-php": "^7.29",
        "phpunit/phpunit": "^9.1"
    }
}
```