const base64url = require('base64url'); // base64url(input), base64url.decode(encoded input)
const jwt = require('jsonwebtoken');
const CryptoJS = require('crypto-js');

// JWT -> header, payload, signature (hash to base64)

const header = { alg: "HS256", typ: "JWT" };
const payload = { sub: 5930091221, name: "Chondan", iat: Date.now() };

const base64url_header = base64url(JSON.stringify(header));
const base64url_payload = base64url(JSON.stringify(payload));

let signature = CryptoJS.HmacSHA256(base64url_header + '.' + base64url_payload, "chondan");
signature = CryptoJS.enc.Base64.stringify(signature);
const base64url_signature = base64url.fromBase64(signature);

// using 'jsonwebtoken' library
const jwt_token = jwt.sign(payload, 'chondan', { algorithm: 'HS256' });

const manual_jwt_token = `${base64url_header}.${base64url_payload}.${base64url_signature}`;
console.log(manual_jwt_token);