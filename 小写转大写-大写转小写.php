<?php
function UP($str)
{
    $str =str_split($str);
    $arr2 = array_map(function($str){

        if(preg_match("/^[a-z]+$/",$str)){
            return strtoupper($str);
        }
        if(preg_match('/^[A-Z]+$/',$str)){
            return strtolower($str);
        }
    },$str);

    $str =implode('',$arr2);
    echo $str;
}
$str ="EDDWadg";
//UP($str);
