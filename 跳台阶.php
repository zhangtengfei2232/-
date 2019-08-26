<?php

function jumpFloor($number)
{
    if($number == 0) return 0;
    if($number == 1) return 1;
    if($number == 2) return 2;
    $first = 1;
    $second = 2;
    for($i = 3; $i <= $number; $i++){
        $sum = $first + $second;
        $first = $second;
        $second = $sum;
    }
    return $sum;
}