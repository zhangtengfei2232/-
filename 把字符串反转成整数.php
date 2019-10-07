<?php

function StrToInt($str)
{
    $len = strlen($str);
    if($len == 0) return 0;
    $result = 0;
    $sign = ($str[0] == '-' ) ? -1 : 1;
    $i = ($str[0] == '-' || $str[0] == '+') ? 1 : 0;
    for (; $i < $len; $i++){
        if(! ($str[$i] >= '0' && $str[$i] <= '9')) return 0;
        $result = $result * 10 + $str[$i] - '0';
        var_dump($result);
    }
    return $result * $sign;
}
StrToInt("123");