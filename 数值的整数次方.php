<?php

function Power($base, $exponent)
{
    $sum = 1;
    for($i = 0; $i < abs($exponent); $i++) $sum *= $base;
    return ($exponent > 0) ? $sum : 1 / $sum;
}