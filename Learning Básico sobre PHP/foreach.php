<?php

$nomes = array(
	'alex',
	'xande',
	'pedro',
	'maria'
);

foreach($nomes as $aluno){
	echo "Aluno: ".$aluno.'<br>';
}

echo "<br>Printando dados do array de arrays<br>";

$grupo = array(
	array('nome'=>'alex', 'idade'=>20),
	array('nome'=>'alex', 'idade'=>20),
	array('nome'=>'alex', 'idade'=>20),
	array('nome'=>'alex', 'idade'=>20)
);

foreach($grupo as $aluno){
	echo "Aluno: ".$aluno["nome"].' Idade: '.$aluno["idade"];
}

$alunos = array(
	'nome'=>'alex',
	'cidade'=>'sanca',
	'sexo'=>'m',
	'idade'=>20
);

echo "<br><br>";

foreach($alunos as $chave => $dado){
	echo $chave . " = " .$dado."<br>";
}

?>