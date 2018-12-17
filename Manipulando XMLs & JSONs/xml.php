<?php

/**
 * PEGANDO DADOS DO XML
 */

// http://servicos.cptec.inpe.br/XML/cidade/241/dia/0/ondas.xml

// se o arquvio estiver vindo da intert
// simplexml_load_string

// $xml = simplexml_load_file("ondas.xml");

// print_r($xml);

// echo "Cidade: " . $xml->nome . "<br><br>";

// echo "Manhã: " . $xml->manha->vento . "<br>";

// echo "Tarde: " . $xml->tarde->vento . "<br>";

// echo "Noite: " . $xml->noite->vento . "<br>";


/**
 * Transformando ARRAY PHP EM XML
 */

// $data -> nosso array
// & -> segue o mesmo princípio que C E C++
// toda alteração dentro da variável $xml_data, vai fazer um referência ao endereço de memória da variável xml_data
function array_to_xml($data, &$xml_data){

	foreach($data as $key => $value){

		if( is_array($value) ){
			// tags de xml não podem ser só números
			// devem possuir pelo menos 1 letra para identificar a tag
			// se o index do array php não for definido
			// concatene 'item' com a chave/index do index
			if( is_numeric($key) ){
				$key = "item" . $key;
			}
			$subnode = $xml_data->addChild($key);
			array_to_xml($value, $subnode);
			
		} else {
			if( is_numeric($key) ){
				$key = 'item' . $key;
			}
			$xml_data->addChild($key, htmlspecialchars($value));
		}
	}
}

$data = array(
	"nome" => "Alex",
	"sobrenome" => "Galhardo",
	"Idade" => 21,
	"caracteristicas" => array(
		"amigo",
		"fiel",
		"companheiro",
		"legal"	
	)
);

$xml_data = new SimpleXMLElement('<data/>');
array_to_xml($data, $xml_data);
$result = $xml_data->asXML();
echo $result;

?>