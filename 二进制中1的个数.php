<?php
function NumberOf1($n)
{
    $count = 0;
    while ($n != 0){
       $count++;
       $n = ($n - 1) & $n;
       var_dump($n);
    }
    return $count;

}
var_dump(NumberOf1(-5));