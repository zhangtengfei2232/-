<?php

function minNumberInRotateArray($rotateArray)
{
    $min = PHP_INT_MAX ;
    foreach ($rotateArray as $key => $value){
        if($min > $value) $min = $value;
    }
    return $min;
}
var_dump(minNumberInRotateArray([-5,35,9,15,8]));