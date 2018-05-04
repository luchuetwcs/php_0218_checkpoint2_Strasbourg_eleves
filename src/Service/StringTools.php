<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        $result = "";
        for ($i = 0; $i < strlen($str); $i++)
        {
            if($str[$i] !== " ")
            {
                $result .= $str[$i];
            }
        }
        return $result;
    }
}

