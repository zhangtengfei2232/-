<?php
function replaceSpace($str)
{
    $string = str_split($str);
    foreach ($string as $key => $value){
        if($value == " ") $string[$key] = "%20";
    }
    return implode($string);                        //数组转化为字符串
}
var_dump(replaceSpace("ssss s22d"));
