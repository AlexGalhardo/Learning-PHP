<?php

/**
 * Nunca confie no usuário ou dados que vem de fora!!!!
 *
 * NUNCA!
 */

/**
 * Filtragem de dados
 */
// filter_var

// filter_input
$nome = filter_input(INPUT_GET, 'nome');
echo $nome;

$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
echo $email;

// filter_list

/**
 * FILTER_VALIDATE_INT
 * verifica se o dado é inteiro
 */
$numero = 10;
if(filter_var($email, FILTER_VALIDATE_INT)){
	echo "É um número inteiro";
} else {
	echo "Não é um número inteiro!";
}


/**
 * FILTER_VALIDATE_BOOLEAN
 * verifica se o dado é boleano
 */

/**
 * FILTER_VALIDATE_URL
 * verifica se o texto é uma url válida
 */

/**
 * FILTER_VALIDATE_EMAIL
 * verifica se o texto dentro da variável é um email
 * antigamente se usava regex
 */
$email = 'teste@gmail.com';
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "É um email";
} else {
	echo "Não é um email!";
}


/**
 * FILTER_VALIDATE_REGEX
 * verifica se é regex
 */

/**
 * FILTER_VALIDATE_IP
 * verifica o ip
 */

/**
 * FILTER_SANITIZE_STRING -> verifica se é string, se não for, transforma em string
 * FILTER_SANITIZE_ENCODED -> transforma os caracteres especiais
 * FILTER_SANITIZE_SPECIAL_CHARS -> transforma html em texto de verdade
 */

$html = "Este é meu <strong>nome</strong>.";
$html = strip_tags($html); // remove as tags HTML
/**
 * transforma html interpretado como texto puro
 */
$texto = filter_var($html, FILTER_SANITIZE_SPECIAL_CHARS);
echo $texto;

?>

<?php
$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_VALIDATE_INT, array(
	'options' => array(
		'min_range' => 1,
		'max_range' => 4,
		'default' => 1
	)
));
echo "Prioridade: " . $prioridade;
?>
<form method="post">
	<select name="prioridade">
		<option value="1">Prioridade 1</option>
	    <option value="2">Prioridade 1</option>
	    <option value="3">Prioridade 1</option>
	    <option value="4">Prioridade 1</option>
	</select>

	<input type="submit" value="enviar">
</form>