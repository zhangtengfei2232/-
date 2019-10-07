<?php

function reOrderArray($array)
{
    $count = 0;
    $convert_array = [];
    $array_length = count($array);

    //方法一：
//    for($i = 0; $i < $array_length; $i++){
//        if($array[$i] % 2 != 0){
//            $count++;
//            array_push($convert_array,$array[$i]);
//        }
//    }
//    for($i = 0; $i < $array_length; $i++){
//        if($array[$i] % 2 == 0){
//            $convert_array[$count++] = $array[$i];
//        }
//    }
    //方法二:双指针
    for($i = 0; $i < $array_length; $i++){

    }
    return $convert_array;
}
var_dump(reOrderArray([11, 2, 66, 8, 3, 9]));