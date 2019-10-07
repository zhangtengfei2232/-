<?php
/**
 * @param $sum
 * @return array
 * 1）由于我们要找的是和为S的连续正数序列，因此这个序列是个公差为1的等差数列，而这个序列的中间值代表了平均值的大小。
 * 假设序列长度为n，那么这个序列的中间值可以通过（S / n）得到，知道序列的中间值和长度，也就不难求出这段序列了。
 * 2）满足条件的n分两种情况：
 * n为奇数时，序列中间的数正好是序列的平均值，所以条件为：(n & 1) == 1 && sum % n == 0；
 * n为偶数时，序列中间两个数的平均值是序列的平均值，而这个平均值的小数部分为0.5，所以条件为：(sum % n) * 2 == n.
 * 3）体面要求序列间按照开始数字从小到大的顺序，而n越大开始数字自然越小，所以从最大n依次递减。假定从1开始加求得超过
 * 100对应的n值，由等差数列公示S=(1+n)*n/2，n=sqrt(2*s)
 */
function FindContinuousSequence($sum)
{
    if($sum < 3) return [];
    $result = [];
    $temp = [];
    $count = 0;
    //方法一:
    for($n = intval(sqrt(2 * $sum)); $n >= 2; $n--){
        if((($n & 1) == 1 && $sum % $n == 0) || ($sum % $n) * 2 == $n){
            for ($i = 0; $i < $n; $i++) array_push($temp, intval(($sum / $n)) - intval(($n - 1) / 2) + $i);
            $result[$count++] = $temp;
            $temp = [];
        }
    }
    //方法二：
//    $begin = 1; $end = 2;
//    $S = 3;
//    while ($begin <= intval($sum / 2)){
//        while ($S > $sum){
//            $S -= $begin;
//            $begin++;
//        }
//        if($S == $sum && $end - $begin >= 1){
//            for ($i = $begin; $i <= $end; $i++) array_push($temp, $i);
//            $result[$count++] = $temp;
//            $temp = [];
//        }
//        $end++;
//        $S += $end;
//    }
    return empty($result) ? [] : $result;
}
var_dump(FindContinuousSequence(9));
