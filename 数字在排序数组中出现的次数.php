<?php

function GetNumberOfK($data, $k)
{
    //方法一：
    if(empty($data)) return 0;
    $len = count($data);
//    $left = 0; $right = $len - 1;
//    while ($left < $len && $data[$left] != $k) $left++;
//    while ($right >= 0 && $data[$right] != $k) $right--;
//    return $left <= $right ? $right - $left + 1 : 0;
    //方法二：二分  取 k 和 k + 1这俩数 找范围
      $getKIndex = getIndex($data, $k);
      $getKTwoIndex = getIndex($data, $k + 1);
      //1.一直向右靠拢，到最右部也没有找到 $getKIndex = $len 。2. 一直向左靠拢，到最左部也没有找到。
      return  ($len == $getKIndex || $data[$getKIndex] != $k) ? 0 : $getKTwoIndex - $getKIndex;
}
function getIndex(&$data, $k)
{
    $left = 0; $right = count($data);
    while ($left < $right){
        $mid = intval(($left + $right) / 2);
        ($data[$mid] >= $k) ? $right = $mid : $left = $mid + 1;
    }
    return $left;
}
var_dump(GetNumberOfK([1,3,3,3,3,4,5],0));