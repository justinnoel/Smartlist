<?php
$servername = "localhost";
$username = "bcxkspna";
$password = '}G"-!gV&8"djcVgs-<y<ua\2pMk%(;Ax{^Tw#u=DJ,uG_)-xSV\+5U@bQuHryCBzR)&c/^L7D\[8R6MT';
$dbname = "bcxkspna_test";
$databaseHost = 'localhost';
$databaseName = 'bcxkspna_test';
$databaseUsername = 'bcxkspna';
$databasePassword = '}G"-!gV&8"djcVgs-<y<ua\2pMk%(;Ax{^Tw#u=DJ,uG_)-xSV\+5U@bQuHryCBzR)&c/^L7D\[8R6MT';
if (!function_exists('encrypt')) {
    function encrypt($data) {
      $key = "xzkLfAePFcpLETMcpUTynohrJoKGAGQInJCYzIxYSbGnqHrorpTsHnsRYwKSyuNsilZBOQRqxXKqpTWKoryJcOdScAvRRayHGQwDSQwsoKeAdlCOLwTgrVMOiVNnwgGqSEFwbanzagKrhChRMcfFPzXBBMRRgabNvJdfOMaqELnBcZWfxwYDkGeOxTrUPuoPiUwSHkcrCnjnuwkWIAHPxMjUcbsZeotvBtMDcoskPorwdffKaQDZzgwFgjVxPusRYduRrhNRdMAPscShgYjGIjCTrMnKymHhegNdtCZoBHBlQxraoWFlhflJxDAECKOWFoJptmydlpBLQzyULiXaLWvNSjeSnqEfKgwdlcCXHEMczqhuqxEtFTVKUCyClOReqasbwEwSovcnYljZinKPhVNtAlCwMJtWUaoGPhoLHNEOVEWIQdAFjOisLJPOXkeUngugCoOpilCMJpghRzPTmYEfvnUkbLguMwZPrXFWaTGBgWRnBvWYEsGFekjboBOQflgGJHRHjKYDpkAfiGioPMnlLuwmhIBAmbatFPZKFsjuAuBUZneuUYxUQxROpDhtqjbqIvtSslMzFksnYQyPkhNOTlIKFnDIazXopvDkapbOCqBYFSZXPJhxmfpxetRjVXzGeYCeCWdLMPbREjWdgAngdMWetKLSyGRjKWOWYhbelvAdoZenbBYqpGbCzCnudxNdazPTOHvFMLciXfTkwhOGJyYOiEGyYxFAQhBCCMrGPryoLkprcNpDJZxUEAWVykunUXYYsPGwuGiFaRcjfLMtLEaAciWfqDWvDZrsYDZubljPsDnmQknjFpXXwsNdHkVmzZqockKzGPmdYdmijlvqGJPRGBSMEgSMcBkRbxMgMAZnZpusoFgWFmoxjDyGCKbe";
      $plaintext = $data;
      $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
      $iv = openssl_random_pseudo_bytes($ivlen);
      $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
      $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
      $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
      return $ciphertext;
    }
}
if (!function_exists('decrypt')) {
    function decrypt($data) {
      $key = "xzkLfAePFcpLETMcpUTynohrJoKGAGQInJCYzIxYSbGnqHrorpTsHnsRYwKSyuNsilZBOQRqxXKqpTWKoryJcOdScAvRRayHGQwDSQwsoKeAdlCOLwTgrVMOiVNnwgGqSEFwbanzagKrhChRMcfFPzXBBMRRgabNvJdfOMaqELnBcZWfxwYDkGeOxTrUPuoPiUwSHkcrCnjnuwkWIAHPxMjUcbsZeotvBtMDcoskPorwdffKaQDZzgwFgjVxPusRYduRrhNRdMAPscShgYjGIjCTrMnKymHhegNdtCZoBHBlQxraoWFlhflJxDAECKOWFoJptmydlpBLQzyULiXaLWvNSjeSnqEfKgwdlcCXHEMczqhuqxEtFTVKUCyClOReqasbwEwSovcnYljZinKPhVNtAlCwMJtWUaoGPhoLHNEOVEWIQdAFjOisLJPOXkeUngugCoOpilCMJpghRzPTmYEfvnUkbLguMwZPrXFWaTGBgWRnBvWYEsGFekjboBOQflgGJHRHjKYDpkAfiGioPMnlLuwmhIBAmbatFPZKFsjuAuBUZneuUYxUQxROpDhtqjbqIvtSslMzFksnYQyPkhNOTlIKFnDIazXopvDkapbOCqBYFSZXPJhxmfpxetRjVXzGeYCeCWdLMPbREjWdgAngdMWetKLSyGRjKWOWYhbelvAdoZenbBYqpGbCzCnudxNdazPTOHvFMLciXfTkwhOGJyYOiEGyYxFAQhBCCMrGPryoLkprcNpDJZxUEAWVykunUXYYsPGwuGiFaRcjfLMtLEaAciWfqDWvDZrsYDZubljPsDnmQknjFpXXwsNdHkVmzZqockKzGPmdYdmijlvqGJPRGBSMEgSMcBkRbxMgMAZnZpusoFgWFmoxjDyGCKbe";
      $c = base64_decode($data);
      $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
      $iv = substr($c, 0, $ivlen);
      $hmac = substr($c, $ivlen, $sha2len=32);
      $ciphertext_raw = substr($c, $ivlen+$sha2len);
      $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
      $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
      if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
      }
    }
}
?>