<?php

namespace App\Libraries;

class Encryption
{
    public function encode($value)
    {
        return bin2hex(\Config\Services::encrypter()->encrypt($value));
    }

    public function decode($value)
    {
        return \Config\Services::encrypter()->decrypt(hex2bin($value));
    }
}

?>