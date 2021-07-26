## FILES
```php
$texto = file_get_contents("texto.txt");
$texto = explode("\n", $texto);
$linhas =  count($texto);
$adicionarTxt = "Novo text para enviar no arquivo";
file_put_contents('nome.txt', $adicionarTxt);
rename('teste.txt', 'novoNome.txt');
rename('teste.txt', 'pasta/teste.txt');
copy('pasta/teste2.txt', 'teste2.txt');
unlink('pasta/teste2.txt');
```

## UPLOAD FILES
- Referência: http://www.devwilliam.com.br/php/detalhando-upload-com-php
```html
<!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset='utf8'/>  
      <title>Upload com PHP</title>  
 </head>  
 <body>  
      <form method="POST" action="upload.php" enctype="multipart/form-data">  
           <label>Informar o arquivo</label>
  
           <input type="file" name="upload"/>
  
           <input type="submit" name="Enviar" value="Enviar">  
      </form>  
 </body>  
 </html> 
```
- O formulário acima é bem simples e será submetido para um script PHP como podemos observar no action=”upload.php”, mas existe uma característica diferente dos formulário que estamos acostumados a construir, o atributo “enctype” na tag. 
- Podem ter certeza que a falta dessa  informação já  fez vários  programadores perderem horas procurando um erro pelo qual o  upload não funciona. 
- O atributo enctype identifica como os dados do  formulário devem ser codificados quando enviados para o  servidor, por padrão quando não informamos nada esse atributo é preenchido com o valor “application/x-www-form-urlencoded“, abaixo uma breve definição dos  3 tipos aceitos  nesse atributo:
   - application/x-www-form-urlencoded – Todos os caracteres são  codificados antes de serem enviados, converte espaços em ‘+’ e caracteres especiais em valores ASCII HEX.
   - multipart/form-data – Os caracteres não são codificados, esse valor é utilizado quando  precisamos trabalhar com upload  de arquivos no formulário.
   - text/plain – Os espaço são convertidos em ‘+’, mas os caracteres especiais não são codificados
- Com essas definições já fica fácil de saber o  porque temos que usar enctype=”multipart/form-data”  para trabalhar com upload  no  formulário, mas ainda tem mais  um detalhe. Sempre que o formulário for executar uploads temos que setar o atributo method=”POST“, isso porque apesar de muitos tentarem (srsrsr) ainda não é possível enviar arquivos  via  método GET.
- Existe ainda uma variação do elemento input com type=”file” implementada a partir do HTML 5, é a inclusão do atributo “multiple” que  possibilita o envio de vários valores (arquivos) no mesmo elemento. Mas não vamos nos ater a esse detalhe nesse artigo, segundo o site http://caniuse.com/ o atributo multiple é suportado a partir do IE 10, outros  navegadores já tem suporte.
- upload.php
```php
/*  
* Verifica se existe a array de upload e se o arquivo enviado possui seu tamanho maior que zero  
*/  
if(isset($_FILES['upload']) && $_FILES['upload']['size'] > 0):    
     /*  
     * Verifica se o upload foi enviado via POST  
     */  
     if(is_uploaded_file($_FILES['upload']['tmp_name'])):  
            
          /*  
          * Verifica se o diretório de destino existe, senão existir cria o diretório  
          */  
          if(!file_exists("/img")):  
               mkdir("img");  
          endif;  
          /*  
          * Monta o caminho de destino do arquivo  
          */  
          $caminho = "img/" . $_FILES['upload']['name'];  
          /*  
          * Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
          */  
          if (move_uploaded_file($_FILES['upload']['tmp_name'], $caminho)):  
               echo "Arquivo enviado com sucesso!";  
          else:  
               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
          endif;  
     endif;  
else:  
     /*  
     * Switch para verificação de posíveis erros durante o upload  
     */  
     $erro = $_FILES['upload']['error'];  
     switch ($erro):  
          case 0:  
               // Não houve erro, o upload foi bem sucedido.  
               break;  
          case 1:  
               echo "O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.";  
               break;  
          case 2:  
               echo "O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML.";  
               break;  
          case 3:  
               echo "O upload do arquivo foi feito parcialmente.";  
               break;  
          case 4:  
               echo "Não foi feito o upload do arquivo.";  
               break;  
          default:  
               echo "Erro desconhecido!";  
               break;  
     endswitch;  
endif;  
```
- Detalhando upload em PHP
   - O script PHP acima tem vários pontos importantes para serem destacados, o objetivo dele é receber a submissão e gravar o arquivo enviado no diretório pré-determinado, nesse exemplo será a pasta com o nome “img“. Mas antes de copiar o arquivo temos que fazer uma série de verificações para que o nosso script grave no local correto, com o nome original e outras verificações por motivo de segurança.
   - É importante entender que quando enviamos uma submissão contendo um elemento input com type=”file” para um script PHP temos acesso a um array associativo chamado $_FILES[], esse array possui elementos contendo informações importantes do arquivo enviado pela submissão, vale ressaltar que mesmo que nenhum arquivo seja enviado o array $_FILES[] vai existir. Através dessas informações podemos manipular o arquivo e até possíveis erros que possam ocorrer durante o upload, vamos aos elementos do $_FILES[‘upload’] usamos o name do input (upload) para acessar o array:
- $_FILES[‘upload’][‘name’] – Nome original do arquivo.
- $_FILES[‘upload’][‘type’] – O tipo mime do arquivo, se o browser deu esta informação. Um exemplo pode ser “image/gif”.
- $_FILES[‘upload’][‘size’] – Tamanho em bytes do arquivo.
- $_FILES[‘upload’][‘tmp_name’] –  O nome temporário do arquivo, como foi guardado no servidor.
- $_FILES[‘upload’][‘error’] – O código de erro associado a este upload de arquivo. (no decorrer do artigo teremos as definições dos erros) 
- Na linha abaixo estou verificando se existe a array $_FILES[] e se o elemento size desse array é maior que 0, executamos 2 verificações porque mesmo que formulário seja enviado sem nenhum arquivo o array $_FILES[] sempre vai existir, nesse caso ainda verifico o size para ter certeza que realmente foi enviado um arquivo.
```php
- if(isset($_FILES['upload']) && $_FILES['upload']['size'] > 0):
```
- Nessa linha abaixo verifico se o upload foi enviado via POST HTTP, sempre existe a possibilidade de um usuário mal intencionado alterar o conteúdo do envio.
```php
if(is_uploaded_file($_FILES['upload']['tmp_name'])): 
``` 
- Nesse ponto o script verifica se existe o diretório de destino, senão existir será criada a pasta com o nome que precisamos /img. Essa verificação ajuda muito porque as vezes podemos esquecer de criar a pasta de destino dos arquivos e consequentemente não funcionar o upload. Por padrão o função mkdir() cria pastas com as permissões 0777, ou seja, acesso mais abrangente é possível alterar essas permissões mas vale ressaltar que se as permissões forem restritas não será possível copiar o arquivo para pasta. 
```php
if(!file_exists("/img")):  
   mkdir("img");  
endif;
```
- Para melhor visualização e didática, estou montando o caminho de destino separado, apenas concatenando o nome da pasta que temos certeza que existe porque verificamos acima com o nome original do arquivo.
```php
$caminho = "img/" . $_FILES['upload']['name'];
```
- Ufa …. agora chegou a parte que realmente interessa, a função move_uploaded_file() recebe 2 parâmetros (1 – nome temporário, 2 – caminho com o nome que será gravado o arquivo) e copia o arquivo da pasta temporária para a pasta de destino que determinamos acima, se for executado com sucesso retorna TRUE senão retorna FALSE, com esse retorno podemos verificar se ocorreu tudo bem e emitir uma mensagem no sucesso ou no erro.
```php
if (move_uploaded_file($_FILES['upload']['tmp_name'], $caminho)):  
    echo "Arquivo enviado com sucesso!";  
else:  
   echo "Houve um erro ao gravar arquivo na pasta de destino!";  
endif; 

if (move_uploaded_file($_FILES['upload']['tmp_name'], $caminho)):  
    echo "Arquivo enviado com sucesso!";  
else:  
   echo "Houve um erro ao gravar arquivo na pasta de destino!";  
endif; 
``` 
- No início do script verificamos se existia o array $_FILES[] e se o size é maior que 0, mas se uma das condições for FALSE, então temos que redirecionar o fluxo de dados para o bloco ELSE. Nesse bloco apenas verifico com switch qual o erro que possivelmente está no elemento error do array, posteriormente exibo uma mensagem na página. Observem que para o valor 0 somente comentei, porque esse valor indica que o upload foi feito com sucesso, caso não exista nenhum valor no elemento error será exibida a mensagem com a opção default.
```php
$erro = $_FILES['upload']['error'];  
switch ($erro):  
    case 0:  
        // Não houve erro, o upload foi bem sucedido.  
        break;  
    case 1:  
        echo "O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.";  
        break;  
    case 2:  
        echo "O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML.";  
        break;  
    case 3:  
        echo "O upload do arquivo foi feito parcialmente.";  
        break;  
    case 4:  
        echo "Não foi feito o upload do arquivo.";  
        break;  
    default:  
        echo "Erro desconhecido!";  
        break;  
endswitch;  
```