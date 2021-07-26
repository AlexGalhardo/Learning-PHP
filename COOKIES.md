## COOKIE
- index.php
   - Verificar se usuário já clicou em "Lembrar Senha"
```php
$email = (isset($_COOKIE['CookieEmail'])) ? base64_decode($_COOKIE['CookieEmail']) : '';
$senha = (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '';
$lembrete = (isset($_COOKIE['CookieLembrete'])) ? base64_decode($_COOKIE['CookieLembrete']) : '';
$checked = ($lembrete == 'SIM') ? 'checked' : '';
```
- login.php
   - setar cookie no browser do usuário com duração de 30 dias
```php
$expira = time() + 60*60*24*30; // cookie expira depois de 30 dias
setCookie('CookieLembrete', base64_encode('SIM'), $expira);
setCookie('CookieEmail', base64_encode($email), $expira);
setCookie('CookieSenha', base64_encode($senha), $expira);