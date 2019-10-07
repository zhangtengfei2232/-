<?php

function ReverseSentence($str)
{
    //方法一：
    return implode(' ', array_reverse(explode(' ', $str)));
    //方法二：
//    $new_str = "";
//    $len = strlen($str);
//    while (true){
//        $index = strpos($str,' ');
//        if($index == 0) return trim($str .' '. $new_str);
//        $new_str = mb_substr($str, 0, $index + 1) . $new_str;
//        $str = mb_substr($str, $index + 1, $len);
//    }
}
var_dump(ReverseSentence("I am"));