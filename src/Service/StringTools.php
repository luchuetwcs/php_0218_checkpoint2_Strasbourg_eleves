<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        $str_arr = explode(" ", $str);

        $clear = implode("", $str_arr);

        $hello= substr($clear, 0, -6);
        $wilder= substr($clear, 5);

        return $hello . " " . $wilder;

}
