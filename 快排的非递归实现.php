<?php
/**
 * 快排的非递归实现
 * @param $data
 * @return bool
 */
$data = [];
function quickSort($num)
{
    if(empty($num)) return false;
    global  $data;
    $data = $num;
    $left = 0;
    $right = count($num) - 1;
    $pointer = [];
    array_push($pointer, $left, $right);
    while (! empty($pointer)){
        //先弹出low, height
        $right = array_pop($pointer);     //取数组最后一个元素
        $left    = array_pop($pointer);
        $pivot  = partition($left, $right);
        //先压入$low, 在压入$height
        if($left < $pivot - 1) array_push($pointer, $left, $pivot - 1);
        if($pivot + 1 < $right) array_push($pointer, $pivot + 1, $right);
    }
    return $data;
}
/**
 * 对数组data中下标从left到right的元素，选取基准元素pivot，
 * 根据与基准比较的大小，将各个元素排到基准元素的两端。
 * 返回值为最后基准元素的位置
 */
function partition($left, $right)
{
    global $data;
    $pivot = $data[$left];              //任选一个元素作为枢轴，这里选择第一个元素
    while ($left < $right){
        while ($left < $right && $data[$right] >= $pivot) $right--;
        $data[$left] = $data[$right];
        while ($left < $right && $data[$left] <= $pivot) $left++;
        $data[$right] = $data[$left];
    }
    //当$left = $right
    $data[$left] = $pivot;              //把中间数添加到$low结束的位置
    return $left;
}
var_dump(quickSort([2, 5, 6, 12, 1]));