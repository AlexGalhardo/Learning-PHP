## JSON
```php
$pessoas = array();

array_push($pessoas, array(
	"nome"=>"João",
	"idade"=>20
));

array_push($pessoas, array(
	"nome"=>"Glaucio",
	"idade"=>25
));

echo json_encode($pessoas);

$json = '[{"nome":"Jo\u00e3o","idade":20},{"nome":"Glaucio","idade":25}]';

$data = json_decode($json, true);

var_dump($data);
```