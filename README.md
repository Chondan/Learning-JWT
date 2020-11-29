# JWT 

- JWT: https://jwt.io/
- [Examples of creating base64 hashes using HMAC SHA256 in different language](https://www.jokecamp.com/blog/examples-of-creating-base64-hashes-using-hmac-sha256-in-different-languages/)
- [HMAC-SHA256 Online Generator Tool](https://www.devglan.com/online-tools/hmac-sha256-online)
- [Base64](https://en.wikipedia.org/wiki/Base64)

---

# Crytography

- Encoding -> for maintaining data *usuability* and can be reversed by employing the same algorithm that encode the content. (no key is used)
- Encryption -> for maintaining data *confidentiality* and requires the use of a key (keyp secret) in order to return to plaintext.
- Hashing -> for validating the *integrity* of content by detecting all modification thereof via obviouse changes to the hash output.
- Obfuscation -> used to *prevent people from understanding* the meaning fo something, and is often used with computer code to help prevent successful reverse engineering and/or theft of a product's functionality.

> integrity: the quality of being honest and having strong moral principles.

In cryptographt there are two types of algorithms used:

1. Symmetric algorithm
A single key is used to encrypt data. When encrypted with the key, the data can be decrypted using the same key.
2. Asymmetric (not indentical on both sides) algorithms
Two keys are used to encrypt and decrypt messages. While one key (public) is used to encrypt the message, the other key (private) can only be used to decrypt it.
