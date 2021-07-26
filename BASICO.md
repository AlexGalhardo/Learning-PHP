## STOP PHP SCRIPT
- die("This file is not ment to be ran. ¯\_(ツ)_/¯");
- exit("This file is not ment to be ran. ¯\_(ツ)_/¯");

## TIPOS DE DADOS
- $false = false;
- global customerFirstName; = define variável dentro uma função que pode ser usado fora dela, escopo global
- $true = true;
- $inteiro = 90;
- $float = 23.5;
- $nulo = null;
- $array = array("Maça", "Banana", "Uva");
- $otherArray = ['alex', 'galhardo'];
   - echo $otherArray[0];
- $string = "AlexGalhardo";
- $stdClass = new stdClass()
   - $stdClass->firstName = "Alex";

### PRINT
- print "Olá mundo";
- echo "Seja vem vindo, {$string}. Você tem " . $inteiro . " anos!";


## STRINGS
- Mais Usadas
<table align=center class="table1 table-striped"> <thead> <tr> <th valign=top> Function</th> <th valign=top> Description</th> <th valign=top> Example</th> <th valign=top> Output</th> </tr> </thead> <tr> <td valign=top> strtolower</td> <td valign=top> Used to convert all string characters to lower case letters</td> <td valign=top> echo strtolower( 'Benjamin');</td> <td valign=top> outputs benjamin</td> </tr> <tr> <td valign=top> strtoupper</td> <td valign=top> Used to convert all string characters to upper case letters</td> <td valign=top> echo strtoupper('george w bush');</td> <td valign=top> outputs GEORGE W BUSH</td> </tr> <tr> <td valign=top> strlen</td> <td valign=top> The string length function is used to count the number of character in a string. Spaces in between characters are also counted</td> <td valign=top> echo strlen('united states of america');</td> <td valign=top> 24</td> </tr> <tr> <td valign=top> explode</td> <td valign=top> Used to convert strings into an array variable</td> <td valign=top> $settings = explode(';', "host=localhost; db=sales; uid=root; pwd=demo"); print_r($settings);</td> <td valign=top> Array ( [0] =&gt; host=localhost [1] =&gt; db=sales [2] =&gt; uid=root [3] =&gt; pwd=demo )</td> </tr> <tr> <td valign=top> substr</td> <td valign=top> Used to return part of the string. It accepts three (3) basic parameters. The first one is the string to be shortened, the second parameter is the position of the starting point, and the third parameter is the number of characters to be returned.</td> <td valign=top> $my_var = 'This is a really long sentence that I wish to cut short';echo substr($my_var,0, 12).'...';</td> <td valign=top> This is a re...</td> </tr> <tr> <td valign=top> str_replace</td> <td valign=top> Used to locate and replace specified string values in a given string. The function accepts three arguments. The first argument is the text to be replaced, the second argument is the replacement text and the third argument is the text that is analyzed.</td> <td valign=top> echo str_replace ('the', 'that', 'the laptop is very expensive');</td> <td valign=top> that laptop is very expensive</td> </tr> <tr> <td valign=top> strpos</td> <td valign=top> Used to locate the and return the position of a character(s) within a string. This function accepts two arguments</td> <td valign=top> echo strpos('PHP Programing','Pro');</td> <td valign=top> 4</td> </tr> <tr> <td valign=top> sha1</td> <td valign=top> Used to calculate the SHA-1 hash of a string value</td> <td valign=top> echo sha1('password');</td> <td valign=top> 5baa61e4c 9b93f3f0 682250b6cf8331b 7ee68fd8</td> </tr> <tr> <td valign=top> md5</td> <td valign=top> Used to calculate the md5 hash of a string value</td> <td valign=top> echo md5('password');</td> <td valign=top> 9f961034ee 4de758 baf4de09ceeb1a75</td> </tr> <tr> <td valign=top> str_word_count</td> <td valign=top> Used to count the number of words in a string.</td> <td valign=top> echo str_word_count ('This is a really long sentence that I wish to cut short');</td> <td valign=top> 12</td> </tr> <tr> <td valign=top> ucfirst</td> <td valign=top> Make the first character of a string value upper case</td> <td valign=top> echo ucfirst('respect');</td> <td valign=top> Outputs Respect</td> </tr> <tr> <td valign=top> lcfirst</td> <td valign=top> Make the first character of a string value lower case</td> <td valign=top> echo lcfirst('RESPECT');</td> <td valign=top> Outputs rESPECT</td> </tr> </table>

- Todas as funções nativas de manipulação de string
<table class="w3-table-all notranslate">
  <tr>
    <th style="width:30%">Function</th>
    <th style="width:70%">Description</th>
  </tr>
  <tr>
    <td><a href="func_string_addcslashes.asp">addcslashes()</a></td>
    <td>Returns a string with backslashes in front of the specified characters</td>
  </tr>
  <tr>
    <td><a href="func_string_addslashes.asp">addslashes()</a></td>
    <td>Returns a string with backslashes in front of predefined characters</td>
  </tr>
  <tr>
    <td><a href="func_string_bin2hex.asp">bin2hex()</a></td>
    <td>Converts a string of ASCII characters to hexadecimal values</td>
  </tr>
  <tr>
    <td><a href="func_string_chop.asp">chop()</a></td>
    <td>Removes whitespace or other characters from the right end of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_chr.asp">chr()</a></td>
    <td>Returns a character from a specified ASCII value</td>
  </tr>
  <tr>
    <td><a href="func_string_chunk_split.asp">chunk_split()</a></td>
    <td>Splits a string into a series of smaller parts</td>
  </tr>
  <tr>
    <td><a href="func_string_convert_cyr_string.asp">convert_cyr_string()</a></td>
    <td>Converts a string from one Cyrillic character-set to another</td>
  </tr>
  <tr>
    <td><a href="func_string_convert_uudecode.asp">convert_uudecode()</a></td>
    <td>Decodes a uuencoded string</td>
  </tr>
  <tr>
    <td><a href="func_string_convert_uuencode.asp">convert_uuencode()</a></td>
    <td>Encodes a string using the uuencode algorithm</td>
  </tr>
  <tr>
    <td><a href="func_string_count_chars.asp">count_chars()</a></td>
    <td>Returns information about characters used in a string</td>
  </tr>
  <tr>
    <td><a href="func_string_crc32.asp">crc32()</a></td>
    <td>Calculates a 32-bit CRC for a string</td>
  </tr>
  <tr>
    <td><a href="func_string_crypt.asp">crypt()</a></td>
    <td>One-way string hashing</td>
  </tr>
  <tr>
    <td><a href="func_string_echo.asp">echo()</a></td>
    <td>Outputs one or more strings</td>
  </tr>
  <tr>
    <td><a href="func_string_explode.asp">explode()</a></td>
    <td>Breaks a string into an array</td>
  </tr>
  <tr>
    <td><a href="func_string_fprintf.asp">fprintf()</a></td>
    <td>Writes a formatted string to a specified output stream</td>
  </tr>
  <tr>
    <td><a href="func_string_get_html_translation_table.asp">get_html_translation_table()</a></td>
    <td>Returns the translation table used by htmlspecialchars() and htmlentities()</td>
  </tr>
  <tr>
    <td style="height: 31px"><a href="func_string_hebrev.asp">hebrev()</a></td>
    <td style="height: 31px">Converts Hebrew text to visual text</td>
  </tr>
  <tr>
    <td><a href="func_string_hebrevc.asp">hebrevc()</a></td>
    <td>Converts Hebrew text to visual text and new lines (\n) into &lt;br&gt;</td>
  </tr>
   <tr>
    <td><a href="func_string_hex2bin.asp">hex2bin()</a></td>
    <td>Converts a string of hexadecimal values to ASCII characters</td>
  </tr>
  <tr>
    <td><a href="func_string_html_entity_decode.asp">html_entity_decode()</a></td>
    <td>Converts HTML entities to characters</td>
  </tr>
  <tr>
    <td><a href="func_string_htmlentities.asp">htmlentities()</a></td>
    <td>Converts characters to HTML entities</td>
  </tr>
  <tr>
    <td><a href="func_string_htmlspecialchars_decode.asp">htmlspecialchars_decode()</a></td>
    <td>Converts some predefined HTML entities to characters</td>
  </tr>
  <tr>
    <td><a href="func_string_htmlspecialchars.asp">htmlspecialchars()</a></td>
    <td>Converts some predefined characters to HTML entities</td>
  </tr>
  <tr>
    <td><a href="func_string_implode.asp">implode()</a></td>
    <td>Returns a string from the elements of an array</td>
  </tr>
  <tr>
    <td><a href="func_string_join.asp">join()</a></td>
    <td>Alias of <a href="func_string_implode.asp">implode()</a></td>
  </tr>
  <tr>
    <td><a href="func_string_lcfirst.asp">lcfirst()</a></td>
    <td>Converts the first character of a string to lowercase</td>
  </tr>
  <tr>
    <td><a href="func_string_levenshtein.asp">levenshtein()</a></td>
    <td>Returns the Levenshtein distance between two strings</td>
  </tr>
  <tr>
    <td><a href="func_string_localeconv.asp">localeconv()</a></td>
    <td>Returns locale numeric and monetary formatting information</td>
  </tr>
  <tr>
    <td><a href="func_string_ltrim.asp">ltrim()</a></td>
    <td>Removes whitespace or other characters from the left side of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_md5.asp">md5()</a></td>
    <td>Calculates the MD5 hash of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_md5_file.asp">md5_file()</a></td>
    <td>Calculates the MD5 hash of a file</td>
  </tr>
  <tr>
    <td><a href="func_string_metaphone.asp">metaphone()</a></td>
    <td>Calculates the metaphone key of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_money_format.asp">money_format()</a></td>
    <td>Returns a string formatted as a currency string</td>
  </tr>
  <tr>
    <td><a href="func_string_nl_langinfo.asp">nl_langinfo()</a></td>
    <td>Returns specific local information</td>
  </tr>
  <tr>
    <td><a href="func_string_nl2br.asp">nl2br()</a></td>
    <td>Inserts HTML line breaks in front 
of each newline in a string</td>
  </tr>
  <tr>
    <td><a href="func_string_number_format.asp">number_format()</a></td>
    <td>Formats a number with grouped thousands</td>
  </tr>
  <tr>
    <td><a href="func_string_ord.asp">ord()</a></td>
    <td>Returns the ASCII value of the first character of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_parse_str.asp">parse_str()</a></td>
    <td>Parses a query string into variables</td>
  </tr>
  <tr>
    <td><a href="func_string_print.asp">print()</a></td>
    <td>Outputs one or more strings</td>
  </tr>
  <tr>
    <td><a href="func_string_printf.asp">printf()</a></td>
    <td>Outputs a formatted string</td>
  </tr>
  <tr>
    <td><a href="func_string_quoted_printable_decode.asp">quoted_printable_decode()</a></td>
    <td>Converts a quoted-printable string to an 8-bit string</td>
  </tr>
  <tr>
    <td><a href="func_string_quoted_printable_encode.asp">quoted_printable_encode()</a></td>
    <td>Converts an 8-bit string to a quoted printable string</td>
  </tr>
  <tr>
    <td><a href="func_string_quotemeta.asp">quotemeta()</a></td>
    <td>Quotes meta characters</td>
  </tr>
  <tr>
    <td><a href="func_string_rtrim.asp">rtrim()</a></td>
    <td>Removes whitespace or other characters from the right side of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_setlocale.asp">setlocale()</a></td>
    <td>Sets locale information</td>
  </tr>
  <tr>
    <td><a href="func_string_sha1.asp">sha1()</a></td>
    <td>Calculates the SHA-1 hash of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_sha1_file.asp">sha1_file()</a></td>
    <td>Calculates the SHA-1 hash of a file</td>
  </tr>
  <tr>
    <td><a href="func_string_similar_text.asp">similar_text()</a></td>
    <td>Calculates the similarity between two strings</td>
  </tr>
  <tr>
    <td><a href="func_string_soundex.asp">soundex()</a></td>
    <td>Calculates the soundex key of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_sprintf.asp">sprintf()</a></td>
    <td>Writes a formatted string to a variable</td>
  </tr>
  <tr>
    <td><a href="func_string_sscanf.asp">sscanf()</a></td>
    <td>Parses input from a string according to a format</td>
  </tr>
   <tr>
    <td><a href="func_string_str_getcsv.asp">str_getcsv()</a></td>
    <td>Parses a CSV string into an array</td>
  </tr>
  <tr>
    <td><a href="func_string_str_ireplace.asp">str_ireplace()</a></td>
    <td>Replaces some characters in a string (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_str_pad.asp">str_pad()</a></td>
    <td>Pads a string to a new length</td>
  </tr>
  <tr>
    <td><a href="func_string_str_repeat.asp">str_repeat()</a></td>
    <td>Repeats a string a specified number of times</td>
  </tr>
  <tr>
    <td><a href="func_string_str_replace.asp">str_replace()</a></td>
    <td>Replaces some characters in a string (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_str_rot13.asp">str_rot13()</a></td>
    <td>Performs the ROT13 encoding on a string</td>
  </tr>
  <tr>
    <td><a href="func_string_str_shuffle.asp">str_shuffle()</a></td>
    <td>Randomly shuffles all characters in a string</td>
  </tr>
  <tr>
    <td><a href="func_string_str_split.asp">str_split()</a></td>
    <td>Splits a string into an array</td>
  </tr>
  <tr>
    <td><a href="func_string_str_word_count.asp">str_word_count()</a></td>
    <td>Count the number of words in a string</td>
  </tr>
  <tr>
    <td><a href="func_string_strcasecmp.asp">strcasecmp()</a></td>
    <td>Compares two strings (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strchr.asp">strchr()</a></td>
    <td>Finds the first occurrence of a string inside another string (alias of strstr())</td>
  </tr>
  <tr>
    <td><a href="func_string_strcmp.asp">strcmp()</a></td>
    <td>Compares two strings (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strcoll.asp">strcoll()</a></td>
    <td>Compares two strings (locale based string comparison)</td>
  </tr>
  <tr>
    <td><a href="func_string_strcspn.asp">strcspn()</a></td>
    <td>Returns the number of characters found in a string before any part of some specified characters are found</td>
  </tr>
  <tr>
    <td><a href="func_string_strip_tags.asp">strip_tags()</a></td>
    <td>Strips HTML and PHP tags from a string</td>
  </tr>
  <tr>
    <td><a href="func_string_stripcslashes.asp">stripcslashes()</a></td>
    <td>Unquotes a string quoted with addcslashes()</td>
  </tr>
  <tr>
    <td><a href="func_string_stripslashes.asp">stripslashes()</a></td>
    <td>Unquotes a string quoted with addslashes()</td>
  </tr>
  <tr>
    <td><a href="func_string_stripos.asp">stripos()</a></td>
    <td>Returns the position of the first occurrence of a string inside another string (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_stristr.asp">stristr()</a></td>
    <td>Finds the first occurrence of a string inside another string (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strlen.asp">strlen()</a></td>
    <td>Returns the length of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_strnatcasecmp.asp">strnatcasecmp()</a></td>
    <td>Compares two strings using a &quot;natural order&quot; algorithm (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strnatcmp.asp">strnatcmp()</a></td>
    <td>Compares two strings using a &quot;natural order&quot; algorithm (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strncasecmp.asp">strncasecmp()</a></td>
    <td>String comparison of the first n characters (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strncmp.asp">strncmp()</a></td>
    <td>String comparison of the first n characters (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strpbrk.asp">strpbrk()</a></td>
    <td>Searches a string for any of a set of characters</td>
  </tr>
  <tr>
    <td><a href="func_string_strpos.asp">strpos()</a></td>
    <td>Returns the position of the first occurrence of a string inside another string (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strrchr.asp">strrchr()</a></td>
    <td>Finds the last occurrence of a string inside another string</td>
  </tr>
  <tr>
    <td><a href="func_string_strrev.asp">strrev()</a></td>
    <td>Reverses a string</td>
  </tr>
  <tr>
    <td><a href="func_string_strripos.asp">strripos()</a></td>
    <td>Finds the position of the last occurrence of a string inside another string (case-insensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strrpos.asp">strrpos()</a></td>
    <td>Finds the position of the last occurrence of a string inside another string (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strspn.asp">strspn()</a></td>
    <td>Returns the number of characters found in a string that contains only characters from a specified charlist</td>
  </tr>
  <tr>
    <td><a href="func_string_strstr.asp">strstr()</a></td>
    <td>Finds the first occurrence of a string inside another string (case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_strtok.asp">strtok()</a></td>
    <td>Splits a string into smaller strings</td>
  </tr>
  <tr>
    <td><a href="func_string_strtolower.asp">strtolower()</a></td>
    <td>Converts a string to lowercase letters</td>
  </tr>
  <tr>
    <td><a href="func_string_strtoupper.asp">strtoupper()</a></td>
    <td>Converts a string to uppercase letters</td>
  </tr>
  <tr>
    <td><a href="func_string_strtr.asp">strtr()</a></td>
    <td>Translates certain characters in a string</td>
  </tr>
  <tr>
    <td><a href="func_string_substr.asp">substr()</a></td>
    <td>Returns a part of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_substr_compare.asp">substr_compare()</a></td>
    <td>Compares two strings from a specified start position (binary safe and optionally case-sensitive)</td>
  </tr>
  <tr>
    <td><a href="func_string_substr_count.asp">substr_count()</a></td>
    <td>Counts the number of times a substring occurs in a string</td>
  </tr>
  <tr>
    <td><a href="func_string_substr_replace.asp">substr_replace()</a></td>
    <td>Replaces a part of a string with another string</td>
  </tr>
  <tr>
    <td><a href="func_string_trim.asp">trim()</a></td>
    <td>Removes whitespace or other characters from both sides of a string</td>
  </tr>
  <tr>
    <td><a href="func_string_ucfirst.asp">ucfirst()</a></td>
    <td>Converts the first character of a string to uppercase</td>
  </tr>
  <tr>
    <td><a href="func_string_ucwords.asp">ucwords()</a></td>
    <td>Converts the first character of each word in a string to uppercase</td>
  </tr>
  <tr>
    <td><a href="func_string_vfprintf.asp">vfprintf()</a></td>
    <td>Writes a formatted string to a specified output stream</td>
  </tr>
  <tr>
    <td><a href="func_string_vprintf.asp">vprintf()</a></td>
    <td>Outputs a formatted string</td>
  </tr>
  <tr>
    <td><a href="func_string_vsprintf.asp">vsprintf()</a></td>
    <td>Writes a formatted string to a variable</td>
  </tr>
  <tr>
    <td><a href="func_string_wordwrap.asp">wordwrap()</a></td>
    <td>Wraps a string to a given number of characters</td>
  </tr>
</table>

### LISTAS
- $lista1 = ['alex', 'joao', 'pedro'];
- $lista2 = ['maria', 'adriana', 'julia'];
- $lista3 = [...$lista1, ...$lista2];
- print_r($lista3);

### DEBUG
- var_dump($variable);
   - mostra informações relevantes sobre o input
- print_r($array);
   - mostra informações úteis sobre o array 

### CONTANTES
- define("APP_URL", "https://localhost/myapp");
- define("SITE", [
   - "name" => "MyApp",
   - "desc" => "Descrição do app",
   - "domain" => "myapp.com",
   - "locale" => "pt_BR",
   - "root" => "https://localhost/app"
- ]);

### SUPERGLOBAIS
- Qual a diferença entre variáveis globais e superglobais? 
   - A diferença é que as super globais não há a necessidade de informar global $variavel, você simplesmente acessa. 
   - Elas estão disponíveis em todos os escopos
- $GLOBALS
- $_SERVER
- $_GET
- $_POST
- $_FILES
- $_COOKIE
- $_SESSION
- $_REQUEST
- $_ENV

### IMPORTAR ARQUIVOS
- include "arquivo.php"; 
   - importar arquivo não relevante no código
- include_once "arquivo2.php";
   - importar arquivo não relevante apenas 1x no código
- require "arquivo.php"; 
   - importar arquivo necessário para execução do código
- include_once "arquivo2.php";
   - importar arquivo necessário para execução do código apenas 1x durante a execução
 

### FUNÇÕES
```php
function getStringFullName(string $firstName = "Alex", string $lastName = "Galhardo"): ?string
   if($firstName or $lastName):
        return $firstName . " " . $lastName;
    else:
        return null;
    endif;
}

function getClassNewStatistics(float $dataOne = null, int $dataTwo = 0): ?\stdClass {
    if($dataOne and $dataTwo):
        $newClass = new stdClass();
        $newClass->firstData = $dataOne;
        $newClass->dataTwo = $dataTwo;
        return $newClass;
    else:
        return null;
    endif;
}
```

![variaveis-estaticas](https://user-images.githubusercontent.com/19540357/80908913-3957f600-8cfa-11ea-85e3-77b137287ee8.png)
![funcoes-anonimas](https://user-images.githubusercontent.com/19540357/80908959-981d6f80-8cfa-11ea-93c6-a0eba4f99a1f.png)
![funcoes-anonimas-2](https://user-images.githubusercontent.com/19540357/80908957-96ec4280-8cfa-11ea-9dfd-9ad06029dcdc.png)



## STOP LOOPINGS
- continue; // Skip current iter
- break; // Exit loop

## FOR
```php
for($indice = 0; $indice < 10; $indice++){
    echo "O valor do indice é: {$indice}" . "<br>";
}
```

## WHILE
```php
$numero = 10;
while($numero > 0){
    echo "Numero atual: $numero <br>";
    $numero--;
}
```

## SWITCH
```php
switch($case){
    case 'case1':
        echo "exibindo case1";
        break;
    case 'case 2':
        echo "exibindo VIDEO";
        break;
    case 'case 3':
        echo "exibindo TEXTO";
        break;
    case 'case4':
    case 'case5':
        echo "case 4 e case 5";
        break;
    default:
        echo "fim";
}
```

## foreach
```php
foreach($users as $user){
    echo $user->name . "<br>";
}

foreach ($array as $key => $value) {
	echo "Nome do campo: " . $key . "<br/>";
	echo "Valor do campo: " . $value . "<br/>";
}
```

## Comandos Úteis
   - echo phpinfo();
      - mostra todas as configurações atuais do php/servidor
   - $ php -v
      - mostra versão do php na CLI
   - $ php -m
      - mostra todos os modulos ativos do php
   - retornar 1 row do sql em forma de objeto
      - $response = $pdo->fetch(PDO::FETCH_OBJ);
   - retornar várias row do sql em forma de array com objetos dentro
      - $response = $pdo->fetchAll(PDO::FETCH_OBJ);
   - require __DIR__ . "/vendor/autoload.php";
      - importar vendor/autoload.php para dentro do arquivo
   - session_start()
      - é usado qd vc tem uma sessão criada e quer propagar a informações da sessão... Uma sessão serve pra guardar valores numa variável, passando de uma página para outra seus valores "automaticamente".
      - key => PHPSESSID / value => 8440cebddc6f9e063a51b9e7f407015a  
   - ob_start() 
      - irá pegar todos os dados de saída e guardar em buffer. Os dados só serão enviados ao navegador no momento em que você encerrar o buffer.
   - ob_end_flush() 
      - Envia o conteúdo do buffer para a saída, esvazia-o e encerra o buffering;
   - ob_flush() 
      - Envia o valor do buffer para o navegador e esvazia-o. Todas as entradas a seguir continuam indo para o buffer;
   - ob_end_clean()
      - Esvazia o buffer e encerra-o. Nenhuma saída é enviada.
   - ob_clean() 
      - apenas limpa o buffer.
   - ob_get_contents()
      - apenas retorna o conteúdo do buffer.
   - new stdClass();
      - uma classe padrão/nativa do PHP