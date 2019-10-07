<?php
function hasPath($matrix, $rows, $cols, $path)
{
    if (empty($matrix) || $rows < 1 || $cols < 1 || $path == null) return false;
    $flag = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if (isFindRoad($matrix, $rows, $cols, $i, $j, 0, $path, $flag))
                return true;
        }
    }
    return false;
}
function isFindRoad($matrix, $rows, $cols, $i, $j, $k, $path, &$flag)
{
    //先根据i和j计算匹配的第一个元素转为一维数组的位置
    $index = $i * $cols + $j;
    //递归终止条件
    if ($i < 0 || $j < 0 || $i >= $rows || $j >= $cols || $matrix[$index] != $path[$k] || $flag[$index] == true)
        return false;
    //若k已经到达path末尾了，说明之前的都已经匹配成功了，直接返回true即可
    if ($k == (strlen($path) - 1)) return true;
    //要走的第一个位置置为true，表示已经走过了
    $flag[$index] = true;
    //回溯，递归寻找，每次找到了就给k加一，找不到，还原
    if (isFindRoad($matrix, $rows, $cols, $i - 1, $j, $k + 1, $path, $flag) ||
        isFindRoad($matrix, $rows, $cols, $i + 1, $j, $k + 1, $path, $flag) ||
        isFindRoad($matrix, $rows, $cols, $i, $j - 1, $k + 1, $path, $flag) ||
        isFindRoad($matrix, $rows, $cols, $i, $j + 1, $k + 1, $path, $flag)){
        return true;
    }
    //走到这，说明这一条路不通，还原，再试其他的路径
    $flag[$index] = false;
    return false;
}