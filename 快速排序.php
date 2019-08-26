<?php
function quickSort($rotateArray, $left, $right)
{
    $temp_left  = $left;
    $temp_right = $right;
    $mid = $rotateArray[intval(($left + $right) / 2)];
    while ($temp_left < $temp_right){                          //左右指针没有重合
        while ($rotateArray[$temp_left] < $mid) ++$temp_left;  //和中间值进行比较，小的指针右移
        while ($rotateArray[$temp_right] > $mid) --$temp_right;//和中间值进行比较，大的指针左移
        if($temp_left <= $temp_right){             //左边有大于中间值的，右边有小于中间值的
            $temp = $rotateArray[$temp_left];
            $rotateArray[$temp_left] = $rotateArray[$temp_right];
            $rotateArray[$temp_right] = $temp;
            --$temp_right;
            ++$temp_left;
        }
    }
    if($temp_left == $temp_right) $temp_left++;
    if($left < $temp_right) quickSort($rotateArray, $left, $temp_left - 1);
    if($temp_left < $right) quickSort($rotateArray, $temp_right + 1, $right);
}
