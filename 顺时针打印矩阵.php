<?php

function printMatrix($matrix)
{
    $row = count($matrix);
    $col = count($matrix[0]);
    if($col == 0 && $row == 0) return $matrix;
    $result = [];
    $left = 0;$right = $col - 1;$top = 0;$bottom = $row - 1;
    while ($left <= $right && $top <= $bottom) {
        for ($i = $left; $i <= $right; $i++)     array_push($result, $matrix[$top][$i]);
        for ($i = $top + 1; $i <= $bottom; $i++) array_push($result, $matrix[$i][$right]);
        //边界判断======>顶部和底部
        if($top != $bottom) for ($i = $right - 1; $i >= $left; $i--) array_push($result, $matrix[$bottom][$i]);
        //边界判断======>左部和右部
        if($left != $right) for ($i = $bottom - 1; $i > $top; $i--) array_push($result, $matrix[$i][$left]);
        $left++; $right--; $top++; $bottom--;//左加，右减，上加，下减
    }
    return $result;
}
var_dump(printMatrix([[1,2],[3,4]]));