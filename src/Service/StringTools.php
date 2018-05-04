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
        $tabSplit=str_split($str);
            while ($tabSplit[0] == " ") {
                array_shift($tabSplit);
            }
           $str = implode("",$tabSplit);
            return $str;
    }

}
