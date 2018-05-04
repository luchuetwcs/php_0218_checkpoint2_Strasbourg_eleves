<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {

            $i = str_split($str);
            $shift = array_shift($i);

            while ($shift === " "){
                $str = implode($i);
                $shift = array_shift($i);
            }

            return $str;

    }
}

