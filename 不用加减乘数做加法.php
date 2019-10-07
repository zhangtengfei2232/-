<?php

function Add($num1, $num2)
{
    while ($num2 != 0){
        $temp = $num1 ^ $num2;
        $num2 = ($num1 & $num2) << 1;
        $num1 = $temp;
    }
    return $num1;
}