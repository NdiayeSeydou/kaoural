<?php

namespace App\Helpers;

class Base62
{
    protected static $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function encode(int $num): string
    {
        $base = strlen(self::$chars);

        $str = '';

        while ($num > 0) {

            $str = self::$chars[$num % $base] . $str;

            $num = intdiv($num, $base);
        }

        return $str;
    }

    public static function decode(string $str): int
    {
        $base = strlen(self::$chars);

        $num = 0;

        for ($i = 0; $i < strlen($str); $i++) {
            
            $num = $num * $base + strpos(self::$chars, $str[$i]);
        }

        return $num;
    }
}
