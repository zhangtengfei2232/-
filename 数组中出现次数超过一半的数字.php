<?php

function MoreThanHalfNum_Solution($numbers)
{
    $num_count = [];
    $len = count($numbers);
    $mid = intval(floor($len / 2));
    for ($i = 0; $i < $len; $i++){
        $num_count[$numbers[$i]]++;
        if($num_count[$numbers[$i]] > $mid) return $numbers[$i];
    }
    return 0;
}
var_dump(MoreThanHalfNum_Solution([1,2,3,2,2,2,5,4,2]));