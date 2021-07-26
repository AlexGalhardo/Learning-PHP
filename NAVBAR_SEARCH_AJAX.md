## NAVBAR SEARCH AJAX
- index.php
```html
<form>
    <input type="text" size="30" onkeyup="showResult(this.value)">
    <div id="livesearch"></div>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function showResult(search) {

    if (search.length == 0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
    }

    let url = 'livesearch.php?search=' + search;
    
    axios.get(url)
        .then(function (response) {
            divResponse = document.getElementById("livesearch")
            divResponse.querySelectorAll('*').forEach(n => n.remove());
            
            for(i=0; i<response.data.length; i++){
                anchorElement = document.createElement("a");
                anchorElement.setAttribute("href", response.data[i].url);
                textAnchor = document.createTextNode(response.data[i].country)
                anchorElement.appendChild(textAnchor);
                console.log(anchorElement)
                divResponse.appendChild(anchorElement);
                br = document.createElement("br");
                divResponse.appendChild(br);
            }
            document.getElementById("livesearch").appendChild(divResponse)
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        })
        .catch(function (error) {
            console.log(error);
        })
}
</script>
```
- cities.json
```json
[
  	{
    	"country": "FRANCA",
    	"url": "success.php?city=franca"
  	},
	{
  		"country": "BRASIL",
    	"url": "success.php?city=brasil"
  	},
  	{
  		"country": "ESTADOS UNIDOS",
    	"url": "success.php?city=estados%20unidos"
  	},
    {
        "country": "BRASIL2",
        "url": "success.php?city=brasil2"
    },
    {
        "country": "BRASIL3",
        "url": "success.php?city=brasil3"
    },
    {
        "country": "BRASILEIRO",
        "url": "success.php?city=brasileiro"
    }
]
```
- livesearch.php
```php
$json = json_decode(file_get_contents(__DIR__ . "/cities.json"));

$search = $_GET["search"];

if (strlen($search) > 0) {
    $response = [];
    
    // poderia ser count($json) também
    for($i=0; $i < sizeof($json); $i++) {
        
        if(stristr($json[$i]->country, $search)){
        	$hint = new stdClass();
        	$hint->country = $json[$i]->country;
        	$hint->url = $json[$i]->url;
        	$response[] = $hint;
        }
    }
}

echo json_encode($response);
```