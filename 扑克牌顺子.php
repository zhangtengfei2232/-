<?php

function IsContinuous($numbers)
{
    if($numbers == null) return false;
    sort($numbers);
    $len = count($numbers);
    $count_zero = 0;
    $difference_sum = 0;
    for($i = 0; $i < $len - 1; $i++){
        if($numbers[$i] === 0){
            $count_zero++;
            continue;
        }
        //相等
        if($numbers[$i] == $numbers[$i + 1]) return false;
        $difference_sum += $numbers[$i + 1] - $numbers[$i] - 1;
    }
    return ($count_zero >= $difference_sum);
}
var_dump(IsContinuous([1,3,2,6,4]));