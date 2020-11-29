<?php 

function base64url_encode( $data ){
  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
}

function base64url_decode( $data ){
  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
}

// JWT TOKEN
// eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.GUKxhZrtD8WUru-KBqX9AlDRfnSUAaThhVjwUTqIUVY

$jwt_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.GUKxhZrtD8WUru-KBqX9AlDRfnSUAaThhVjwUTqIUVY";

$jwt_array = preg_split('/\./', $jwt_token, -1, PREG_SPLIT_NO_EMPTY);

$header = $jwt_array[0];
$payload = $jwt_array[1];
$signature = $jwt_array[2]; // [hash method from header] -> $base64url_header, '.', $base64url_header, 'secret_key'

$json_header = base64url_decode($header);
$json_payload = base64url_decode($payload);
$hash_signature = base64url_decode($signature);

$check_signature = hash_hmac('sha256', $header.".".$payload, 'chondan', true);

echo $hash_signature == $check_signature;
echo "\n";
// echo $check_signature;

?>