<?php
$num_list = [];
function Permutation($str)
{
    if(empty($str)) return [];
    global $num_list;
    $num_list = [];
    $str_arr = str_split($str);
    getNumberList($str_arr, 0);
    $num_list = array_unique($num_list);
    sort($num_list);
    return $num_list;
}
function getNumberList($str_arr,  $k)
{
    global $num_list;
    if($k == count($str_arr)){
        array_push($num_list, implode($str_arr));     //转成字符串添加到数组中
        return ;
    }
    for($i = $k; $i < count($str_arr); $i++){
        $temp = $str_arr[$i];
        $str_arr[$i] = $str_arr[$k];
        $str_arr[$k] = $temp;
        getNumberList($str_arr, $k + 1);
        $temp = $str_arr[$i];
        $str_arr[$i] = $str_arr[$k];
        $str_arr[$k] = $temp;
    }
}
var_dump(Permutation("ztf"));