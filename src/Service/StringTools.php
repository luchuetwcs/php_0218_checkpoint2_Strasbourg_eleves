<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    /**
     * @param string $str
     * @return string
     */
    public static function trimWhiteSpaces(string $str):string
    {

        //return implode('', array_diff(str_split($str), [' ']));
        $tab = str_split($str);
        while ($tab[0]==' '){
            array_shift($tab);
        }
        $str = implode("",$tab);
        return $str;
    }
}

