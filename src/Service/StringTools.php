<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        $res = '';

        $res = str_replace(' ', '', $str);

        return $res;

}
