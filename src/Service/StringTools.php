<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        //TODO Write your code here,
        //TODO And return something at the end...
        $array = str_split($str);
        $shift = array_shift($array);
        while($shift === " "){
            $str = implode ($array);
            $shift = array_shift($array);
        }
        return $str;
    }
}
