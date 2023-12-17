<?php
/**
 * Überprüft, ob die Eingabe leere String aufweist.
 * @param $array, $_POST Array
 * @return bool true, wenn Array nicht leer
 */
function validate_string( $array):bool{
        foreach ($array as $value => $item){
            if(empty($value)){return false;}
            if(empty($item)){return false;}
    }
  return  true;
}