<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        while ($str[0] == " ") {
            $str = substr($str, 1, strlen($str) - 1);
        }
        return $str;
    }
}
