<?php

//方法一：利用二分插入，使数组有序
$num_data = [];
function Insert($num)
{
    global  $num_data;
    $count = count($num_data);
    if ($count == 0){
        array_push($num_data, $num);
        return;
    }
    $start = 0; $end = $count - 1; $temp_index = 0;
    while ($start <= $end) {
        $temp_index = intval(($start + $end) / 2);
        ($num_data[$temp_index] > $num) ? $end = $temp_index - 1 : $start = $temp_index + 1;
    }
    array_splice($num_data, $start, 0, [$num]);
    //方法二：用大小顶堆  小顶堆维护从小到大。大顶堆从大于小顶堆的最大值开始，从小到大排序
}
function GetMedian(){
    global $num_data;
    $count = count($num_data);
    return ($count & 1) ? $num_data[intval($count / 2)] : ($num_data[intval($count / 2) - 1] + $num_data[intval($count / 2)]) / 2.0;
}