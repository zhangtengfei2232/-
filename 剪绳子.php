<?php

function cutRope($number)
{
    //方法一：
//    $m = $number % 3;
//    $n = floor($number / 3);
//    if($number <= 2){
//        $result = 1;
//    }else if($number == 3) {
//        $result = 2;
//    }else if($m == 0) {
//        $result = pow(3, $n);
//    }else if($m == 1) {
//        $result = pow(3, $n - 1) * 4;
//    }else if($m == 2) {
//        $result = pow(3, $n)*2;
//    }
//    return $result;
    //方法二：
    if ($number < 2) return 0;
    if ($number == 2) return 1;
    if ($number == 3) return 2;
    $product = [];
    for ($i = 0; $i < 4; $i++) $product[$i] = $i;
    for ($i = 4; $i <= $number; $i++) {
        $max = 0;
        for ($j = 1; $j <= intval($i / 2); $j++) {
            $temp_product = $product[$j] * $product[$i - $j];
            if ($max < $temp_product) $max = $temp_product;
        }
        $product[$i] = $max;
    }
    return $product[$number];
}