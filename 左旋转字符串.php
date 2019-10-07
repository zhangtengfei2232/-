<?php

function LeftRotateString($str, $n)
{
    if($str == null || $n < 0) return "";
    $string_one = substr($str, 0, $n);
    $string_two = substr($str, $n, strlen($str));
    $string_two .= $string_one;
    return $string_two;
}
var_dump(LeftRotateString("abcdefg",2));