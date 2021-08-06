<?php


namespace App\Parts\Security\Hash;


class Hasher
{
    public static function make($password)
    {
            return substr(md5($password),0,25).substr(md5($password),0,25);
    }

    public static function check($plain_text,$hashed)
    {
        return self::make($plain_text)===$hashed;
    }
}
