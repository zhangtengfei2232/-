<?php
$data = [];
function GetLeastNumbers_Solution($input, $k)
{
//      global $data;
//      $data = $input;
      //方法一：利用快排思想
//      return array_splice($data, 0, getIndex(0, count($input) - 1, $k));
      //方法二：双重循环
    $len = count($input);
    if($len < $k || ! $k) return [];
    $get_min_num = [];
    $i = 0;
    for(; $i < $len; $i++){
        for($j = $i + 1; $j < $len; $j++){
            if($input[$i] > $input[$j]){
                $temp = $input[$i];
                $input[$i] = $input[$j];
                $input[$j] = $temp;
            }
        }
        array_push($get_min_num, $input[$i]);              //把最小的数放到数组中
        if ($i + 1 == $k) return $get_min_num;             //如果k最小数字已经收集完成 返回
    }
}
//function getIndex($low, $high, $k)
//{
//    $index = quickSort($low, $high);
//    while ($index != $k){
//        if($index > $k - 1){
//            $index = quickSort($low, $index - 1);
//            continue;
//        }
//        $index = quickSort($index + 1, $high);
//    }
//    return $index;
//
//}
//function quickSort($low, $high)
//{
//    global $data;
//    $temp = $data[$low];
//    while ($low < $high){
//        while ($low < $high && $data[$high] >= $temp) $high--;
//        $data[$low] = $data[$high];
//        while ($low < $high && $data[$low] <= $temp) $low++;
//        $data[$high] = $data[$low];
//    }
//    $data[$low] = $temp;
//    return $low;
//}

var_dump(GetLeastNumbers_Solution([59,5,1,6,4,7,3,8],3));