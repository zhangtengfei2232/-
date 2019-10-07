<?php

function isNumeric($s)
{
    //方法一：用正则
//    return preg_match("/[\\+\\-]?\\d*(\\.\\d+)?([eE][\\+\\-]?\\d+)?/",$s);
    //方法二：
    if($s == null) return false;
    $length = strlen($s);
    $n = 0;
    $isNumeric = isSignInt($s, $n, $length);
    if($s[$n] == '.'){
        $n++;
        $isNumeric = isUnsignInt($s, $n, $length) || $isNumeric;
    }
    if($s[$n] == 'e' || $s[$n] == 'E'){
        $n++;
        $isNumeric = $isNumeric && isSignInt($s, $n, $length);
    }
    return $isNumeric && ($length == $n);
}

function isUnsignInt($s, &$n, $length)
{
    $temp_n = $n;
    while ($n < $length && $s[$n] >= '0' && $s[$n] <= '9') $n++;
    return $n > $temp_n;
}

function isSignInt($s, &$n, $length)
{
    if($s[$n] == '+' || $s[$n] == '-') $n++;
    return isUnsignInt($s, $n, $length);
}
