<?php

function duplicate($numbers, $duplication)
{
    //方法一：
//    sort($numbers);
//    for($i = 0; $i < count($numbers) - 1; $i++){
//        if($numbers[$i] == $numbers[$i + 1]){
//            $duplication[0] = $numbers[$i];
//            return true;
//        }
//    }
    //方法二：
//    $is_twice = [];
//    for($i = 0; $i < count($numbers); $i++){
//        if($is_twice[$numbers[$i]] == true){
//            $duplication[0] = $numbers[$i];
//            return true;
//        }
//        $is_twice[$numbers[$i]] = true;
//    }

    //方法三：更好
    $len = count($numbers);
    $two_len = 2 * $len;
    for($i = 0; $i < $len; $i++){
        $index = $numbers[$i] % $len;
        $numbers[$index] += $len;
        if($numbers[$index] >= $two_len){
            $duplication[0] = $numbers[$index] % $len;
            return true;
        }
    }
    return false;
}
duplicate([2,1,3,1,4],[]);