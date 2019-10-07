<?php
/**
 * p = 2^x * 3^y * 5^z;   每次让 x | y | z 一次+1
 * @param $index
 * @return mixed
 */
function GetUglyNumber_Solution($index)
{
    //小于6，可以直接返回
    if($index < 6) return $index;
    $two = 0;
    $three = 0;
    $five = 0;
    $num[0] = 1;
    for($i = 1; $i < $index; $i++){
        $newTwo   = $num[$two] * 2;
        $newThree = $num[$three] * 3;
        $newFive  = $num[$five] * 5;
        //每次三个数乘完以后，进行比较排序，选出最小的作为下一个丑数
        $num[$i] = min($newTwo, min($newThree, $newFive));
        //接下来判断一下，这次乘的是{2， 3， 5}中的哪一个，可能进去多个，因为有可能计算以后，有"多个"最小数
        if($num[$i] == $newTwo) $two++;
        if($num[$i] == $newThree) $three++;
        if($num[$i] == $newFive) $five++;
    }
    return $num[$index - 1];
}
