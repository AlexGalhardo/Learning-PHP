<?php
class JWT {

	private $secret;

	public function __construct() {
		$this->secret = "abC123!";
	}

	public function create($data) {

		$header = json_encode(array("typ"=>"JWT", "alg"=>"HS256"));

		$payload = json_encode($data);

		$hbase = $this->base64url_encode($header);
		$pbase = $this->base64url_encode($payload);

		$signature = hash_hmac("sha256", $hbase.".".$pbase, $this->secret, true);
		$bsig = $this->base64url_encode($signature);

		$jwt = $hbase.".".$pbase.".".$bsig;

		return $jwt;
	}

	public function validate($token) {
		// Passo 1: Verificar se o TOKEN tem 3 partes.
		// Passo 2: Bater a assinatura com os dados
		
        // array() cria um array
		$array = array();
        
        // separa a string em um array, separe onde fica o ponto '.'
		$jwt_split = explode('.', $token);

		if(count($jwt_split) == 3) {
			$signature = hash_hmac("sha256", $jwt_split[0].".".$jwt_split[1], $this->secret, true);
			$bsig = $this->base64url_encode($signature);

			if($bsig == $jwt_split[2]) {

				$array = json_decode($this->base64url_decode($jwt_split[1]));
				return $array;

			} else {
				return false;
			}

		} else {
			return false;
		}

	}

	private function base64url_encode( $data ){
	  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
	}

	private function base64url_decode( $data ){
	  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
	}

}