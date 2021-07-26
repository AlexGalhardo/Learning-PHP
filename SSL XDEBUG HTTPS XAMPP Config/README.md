## CONFIGURAÇÕES APACHE
- $ sudo subl /opt/lampp/etc/php.ini
- memory_limit=512M
- error_reporting=E_ALL
- display_errors=On
- date.timezone=America/Sao_Paulo
- extension=php_openssl.dll
- ;extension=php_pgsql.dll (se for trabalhar com postgresql)

- $ sudo subl /opt/lampp/etc/httpd.conf
- LoadModule rewrite_module modules/mod_rewrite.so
- User alex (ls -la para ver user)

## Instalando SSL no LOCALHOST
- Copiando arquivos
   - $ sudo cp localhost.crt /opt/lampp/etc/ssl.crt/
   - $ sudo cp localhost.key /opt/lampp/etc/ssl.crt/
- Verificando arquivos
   - $ ls /opt/lampp/etc/ssl.crt
- Alterar arquivo
   - $ cd /opt/lampp/etc/extra
   - $ sudo subl httpd-ssl.conf
   - Mudar SSLCertificateFile "/opt/lampp/etc/ssl.crt/server.crt" 
      - Para SSLCertificateFile "/opt/lampp/etc/ssl.crt/localhost.crt"
      - Para SSLCertificateKeyFile "/opt/lampp/etc/ssl.crt/localhost.key"
- Reiniciar APACHE
- Adicionar CERTIFICADO NO CHROME
   - Abrir configurações
   - perquisar certificados ssl/hhtps
   - Cliar em autoridades -> IMPORTar certificado -> selecionar localhostCA.pem
   - Atualizar brownser

## Instalando XDEBUG
- acessar: https://xdebug.org/wizard
- acessar: https://localhost/dashboard/phpinfo.php
- copiar tudo do phpinfo.php com CRTL+A + CRTL+X
- colar todo conteúdo do phpinfo.php dentro do input de xdebug.org
- seguir as instruções da página xdebug.org
{"mode":"full","isActive":false}