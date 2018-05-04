<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        $array = str_split($str);
        $shift = array_shift($array);
        while ($shift === " "){
            $str = implode($array);
            $shift = array_shift($array);
        }
        return $str;
    }
}

