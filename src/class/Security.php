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


    public function encrypt($string)
    {
        if (not_empty($string)) {
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext_raw = openssl_encrypt($string, $cipher, $this->getKey(), $options = OPENSSL_RAW_DATA, $iv);
            $hmac = hash_hmac('sha256', $ciphertext_raw, $this->getKey(), $as_binary = true);
            $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
            return $ciphertext;
        }
        return null;
    }


    public function decrypt($string)
    {
        if (not_empty($string)) {
            $c = base64_decode($string);
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len = 32);
            $ciphertext_raw = substr($c, $ivlen + $sha2len);
            $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $this->getKey(), $options = OPENSSL_RAW_DATA, $iv);
            $calcmac = hash_hmac('sha256', $ciphertext_raw, $this->getKey(), $as_binary = true);
            if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
            {
                return $original_plaintext;
            }
        }
        return null;
    }

    public function hash($string)
    {
        if (not_empty($string)) {
            $md5 = md5($string);
            $sha1 = sha1($md5);
            $sha256 = hash("sha256", $sha1);
            $reverse = strrev($sha256);
            $pw_hash = password_hash($reverse, PASSWORD_DEFAULT);
            return $pw_hash;
        }
        return null;
    }

    public function random($length = 8)
    {
        $salt = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        $maxIndex = count($salt) - 1;

        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $maxIndex);
            $result .= $salt[$index];
        }
        return $result;
    }


}
