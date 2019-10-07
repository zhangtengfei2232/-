<?php
function movingCount($threshold, $rows, $cols)
{
    $flag = array_fill(0, $rows, array_fill(0, $cols, 0));
    return countRange(0, 0, $rows, $cols, $flag, $threshold);
}
function countRange($i, $j, $rows, $cols, &$flag, $threshold)
{
    if ($i < 0 || $i >= $rows || $j < 0 || $j >= $cols || getSum($i) + getSum($j) > $threshold || $flag[$i][$j] == 1)
        return 0;
    $flag[$i][$j] = 1;
    return 1 + countRange($i - 1, $j, $rows, $cols, $flag, $threshold) +
               countRange($i, $j - 1, $rows, $cols, $flag, $threshold) +
               countRange($i + 1, $j, $rows, $cols, $flag, $threshold) +
               countRange($i, $j + 1, $rows, $cols, $flag, $threshold);
}
function getSum($num)
{
    $num = $num."";
    $num = str_split($num, 1);
    $sum = 0;
    foreach ($num as $value) $sum += $value;
    return $sum;
}