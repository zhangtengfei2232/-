<?
function FindGreatestSumOfSubArray($array)
{
    $len = count($array);
    if($len == 0) return false;
    $sum = $array[0];
    $max = $array[0];
    for($i = 1; $i < $len; $i++){
        if($sum < 0) $sum = 0;          //只要前面的序列大于0就可以直接加，否则，前面的序列和置为0
        $sum += $array[$i];             //当序列总和小于0的时候，可以暂存前面序列的最大值，sum重新计算，开始新序列
        $max = max($sum, $max);         //始终保存最大子序列值
    }
    return $max;
}
