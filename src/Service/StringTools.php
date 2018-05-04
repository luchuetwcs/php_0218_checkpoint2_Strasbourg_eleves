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

        $str= substr_replace($str,"",0,1);
        return $str;


        //TODO And return something at the end...
    }
}
