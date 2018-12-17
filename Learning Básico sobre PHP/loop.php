<?php

echo "<hr><h1>While</h1>";

$i = 1;
while($i <= 3){
    $i++;
    echo "The number is " . $i . "<br>";
}

echo "<hr><h1>Do...While</h1>";

$index2 = 1;
do{
    $index2++;
    echo "The number is " . $index2 . "<br>";
}
while($index2 <= 3);


echo "<hr><h1>For</h1>";

for($index3=1; $index3<=3; $index3++){
    echo "The number is " . $index3 . "<br>";
}


echo "<hr><h1>ForEach</h1>";

$colors = array("Red", "Green", "Blue");
 
// Loop through colors array
foreach($colors as $value){
    echo $value . "<br>";
}

$superhero = array(
    "name" => "Peter Parker",
    "email" => "peterparker@mail.com",
    "age" => 18
);
 
// Loop through superhero array
foreach($superhero as $key => $value){
    echo $key . " : " . $value . "<br>";
}