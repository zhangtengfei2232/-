<?php
/**
 * @param $array
 * @param $sum
 * @return array
 * 1.定义两个指针，第一个指向第一个元素，第二个指向最后一个元素；
 * 2.先拿第一个元素和最后一个元素相加，与要求的数字进行比较；
 *   1）如果等于，恭喜找到了；
 *   2）如果大于，则将第二个指针向后移一位（索引值－1），再求和进行比较；
 *   3）如果小于，则将第一个指针向前移一位（索引值＋1），在进行求和比较；
 * 找到的第一组（相差最大的）就是乘积最小的。可以这样证明：考虑x+y=C（C是常数），x*y的大小。
 * 不妨设y>=x，y-x=d>=0，即y=x+d, 2x+d=C, x=(C-d)/2, x*y=x(x+d)=(C-d)(C+d)/4=(C^2-d^2)/4，
 * 也就是x*y是一个关于变量d的二次函数，对称轴是y轴，开口向下。d是>=0的，d越大, x*y也就越小。
 */
function FindNumbersWithSum($array, $sum)
{
    if(count($array) < 2 || $array == null) return $array;
    $data = [];
    $len = count($array);
    $start = 0;
    $end = $len - 1;
    while ($start < $end && $start < $len - 1 && $end > 0){
        $temp_sum = $array[$start] + $array[$end];
        if($temp_sum == $sum){
            array_push($data, $array[$start]);
            array_push($data, $array[$end]);
            return $data;
        }
        ($temp_sum > $sum) ? $end-- : $start++;
    }
    return $data;
}