/**  
* Created by https://8gwifi.org  
* User: Anish Nath  
* Date: 2018-12-10  
* Time: 15:13  
*/  
  
<?php  
  
//php aes-256-gcm Dec Example  
$aad = "not secret";
$Iv = "2D71A37171EDBA0F7394E10D";
$Key = "B04F48A152DA38193EBB8DF18D64AA0FD9B7B851D1B1C32DC171BE1E28095541";
$EncryptedData = "D8A850A16FED927602BB173AE2C5B7F5";
$Tag = "9F1540D172";
$original_plaintext = openssl_decrypt($EncryptedData, "aes-256-gcm", $Key, $options=OPENSSL_RAW_DATA, $Iv, $Tag, $aad);  
echo "Decrypted Text: $original_plaintext";  
var_dump($original_plaintext);
echo "Decrypted Text: $original_plaintext";

?>