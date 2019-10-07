<?php
/**
 * B0 B1    B2     B3
 * 1  A0B0  A1B1   A2B2
 * @param $numbers
 * @return array
 */
function multiply($numbers)
{
    $len = count($numbers);
    if ($numbers == null || $len == 0) return [0];
    $num[0] = 1;
    for($i = 1; $i < $len; $i++) $num[$i] = $num[$i - 1] * $numbers[$i - 1];
    $temp = 1;
    for($i = $len - 2; $i >= 0; $i--){
        $temp *= $numbers[$i + 1];
        $num[$i] *= $temp;
    }
    return $num;
}
var_dump(multiply([1, 2 , 3]));