<?php

function maxInWindows($num, $size)
{
    $num_data = [];
    $count = count($num);
    if (empty($num) || $count == 0 || $size == 0 || $size > $count) return $num_data;
    $queue = [];
    for ($i = 0; $i < $count; $i++) {
        if (! empty($queue)) {
            //如果队列头元素不在滑动窗口中，就删除元素
            if ($i >= reset($queue) + $size) array_shift($queue);
            //如果当前的数字大于队尾元素，则删除队尾元素，直到当前的数字小于等于队尾，或者队列为空
            while (! empty($queue) && $num[$i] >= $num[end($queue)]) array_pop($queue);
        }
        array_push($queue, $i);          //入队列
        //滑动窗口经过size个元素，获取当前的最大值，也就是队列的头元素
        if ($i + 1 >= $size) array_push($num_data, $num[reset($queue)]);
    }
    return $num_data;
}