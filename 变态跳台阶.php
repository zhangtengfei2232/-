<?php
function jumpFloorII($number)
{
    //方法一
    if($number <= 2) return $number;
    return 2 * jumpFloorII($number - 1);
    //方法二
//    return pow(2, $number - 1);
}
