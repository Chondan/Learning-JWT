const CryptoJS = require('crypto-js');
const base64url = require('base64url');

const jwt_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1OTMwMDkxMjIxIiwibmFtZSI6IkNob25kYW4iLCJpYXQiOiIyMDIwLTExLTI5VDA2OjU5OjE2LjE4MFoifQ.Xx28jV-82zEWr_qeIPyZJrT9mW0HHSVkUsRw4Cih0yI";

const [header, payload, signature] = jwt_token.split('.');

const key = 'chondan';

const hash_sign = CryptoJS.HmacSHA256(`${header}.${payload}`, key);
const base64_sign = CryptoJS.enc.Base64.stringify(hash_sign);
const base64url_sign = base64url.fromBase64(base64_sign);


console.log(signature, base64url_sign);