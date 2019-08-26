<?php
function Fibonacci($n)
{
    if($n == 0) return 0;
    if($n == 1) return 1;
    $first = 0;
    $second = 1;
    for ($i = 1; $i < $n; $i++){
        $sum = $first + $second;
        $first = $second;
        $second = $sum;
    }
    return $sum;
}
var_dump(Fibonacci(3));