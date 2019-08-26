<?php

function IsPopOrder($pushV, $popV)
{
    $push_array = [];
    $j = 0;
    for($i = 0; $i < count($popV); $i++){
        array_unshift($push_array, $pushV[$i]);
        while ($j < count($popV) && $push_array[0] == $popV[$j]) {
            array_splice($push_array, 0, 1);
            $j++;
        }
    }
    return empty($push_array);
}
var_dump(IsPopOrder([1,2,3,4,5],[4,5,3,2,1]));