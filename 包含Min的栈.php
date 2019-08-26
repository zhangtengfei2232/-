<?php

$result = [];
function mypush($node)
{
   global $result;
    array_unshift($result,$node);
}
function mypop()
{
    global $result;
    array_splice($result, 0, 1);  //0——>第一个元素。1——>移除的个数,保持数组索引
}
function mytop()
{
    global $result;
    return array_shift($result);
}
function mymin()
{
    global $result;
    $min = $result[0];
    for($i = 1; $i < count($result); $i++)
        if($min > $result[$i]) $min = $result[$i];
    return $min;
}
mypush(3);
var_dump(mymin());
mypush(4);
var_dump(mymin());
mypush(2);
var_dump(mymin());
mypush(3);
var_dump(mymin());
mypop();
var_dump(mymin());
mypop();
var_dump(mymin());
mypop();
mypush(0);
var_dump(mymin());
