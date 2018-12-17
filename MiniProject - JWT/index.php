<?php

/**
 * https://jwt.io/
 */

require 'jwt.php';

$jwt = new JWT();

$token = $jwt->create(array("id_user"=>123, "nome"=>"GalhardoAlex"));

echo "TOKEN: ".$token;
