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

          $explodeStr = explode(' ', $str);
          $helloWilder = [];

          foreach ($explodeStr as $value)
          {
            if(strlen($value) > 2)
			      {
                $helloWilder[] = $value;
			      }
          }

          var_dump(implode(' ', $helloWilder));


          return  implode(' ',$helloWilder);

    }
}
