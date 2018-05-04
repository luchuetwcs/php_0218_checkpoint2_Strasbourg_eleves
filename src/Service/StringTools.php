<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static function trimWhiteSpaces(string $str):string
    {
        $result='';
        $tab = str_split($str);

        foreach($tab as $k => $v){
            if ($v!=' '){
                $result.=$v;
            }
        }return $result;
    }
}
