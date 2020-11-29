<?php 

$s = hash_hmac('sha256', 'Chondan', 'secret' ,true);

class Header {
	function __construct($alg, $typ) {
		$this->alg = $alg;
		$this->typ = $typ;
	}
}

class Payload {
	function __construct($sub, $name, $iat) {
		$this->sub = $sub;
		$this->name = $name;
		$this->iat = $iat;
	}
}

function base64url_encode( $data ){
  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
}

function base64url_decode( $data ){
  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
}

$header = new Header("HS256", "JWT");
$payload = new Payload("1234567890", "John Doe", 1516239022);

$json_header = json_encode($header);
$json_payload = json_encode($payload);

$base64_header = base64url_encode($json_header);
$base64_payload = base64url_encode($json_payload);

$signature = hash_hmac('sha256', $base64_header.".".$base64_payload, "chondan", true);
$base64_signature = base64url_encode($signature);

$jwt_token = $base64_header.".".$base64_payload.".".$base64_signature;

echo $jwt_token;
echo "\n";



?>