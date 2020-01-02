<?php

class Security
{

    private $key;

    public function setKey($key)
    {
        $this->key = $key;
    }

    private function getKey()
    {
        return $this->key;
    }


    public function encrypt($plaintext)
    {
        if (not_empty($plaintext)) {
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $this->getKey(), $options = OPENSSL_RAW_DATA, $iv);
            $hmac = hash_hmac('sha256', $ciphertext_raw, $this->getKey(), $as_binary = true);
            $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
            return $ciphertext;
        }
        return null;
    }


    public function decrypt($ciphertext)
    {
        if (not_empty($ciphertext)) {
            $c = base64_decode($ciphertext);
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len = 32);
            $ciphertext_raw = substr($c, $ivlen + $sha2len);
            $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $this->getKey(), $options = OPENSSL_RAW_DATA, $iv);
            $calcmac = hash_hmac('sha256', $ciphertext_raw,  $this->getKey(), $as_binary = true);
            if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
            {
                return $original_plaintext;
            }
        }
        return null;
    }


}
