<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        $arr = str_split($str);
        $first = array_shift($arr);

        while($first === " "){
            $str = implode ($arr);
            $first = array_shift($arr);
        }
        return $str;
    }
}
