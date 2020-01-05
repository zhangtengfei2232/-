<?php

function findMaxLcs($strOne, $strTwo) {
    $arrOne = array_fill(0, strlen($strOne) + 1, array_fill(0, strlen($strTwo) + 1, 0));
    $arrTwo = LcsLength($strOne, $strTwo, $arrOne);
    echo $arrTwo[strlen($strOne)][strlen($strTwo)] . "\n";
    Lcs(strlen($strOne), strlen($strTwo), $strOne, $arrOne);
}

/**
 * $arrTwo[i][j]存储Xi和Yj的最长公共子序列的长度
 * $arrOne[i][j]记录$arrTwo[i][j]的值是由哪一个子问题的解得到的，在构造最长公共子序列时要用到
 * @param $strOne
 * @param $strTwo
 * @param $arrOne
 * @return array
 */
function LcsLength($strOne, $strTwo, &$arrOne) {
    $arrTwo = array_fill(0, strlen($strOne) + 1, array_fill(0, strlen($strTwo) + 1, 0));
    for ($i = 1; $i <= strlen($strOne); $i++) {
        for ($j = 1; $j <= strlen($strTwo); $j++) {
            if ($strOne[$i - 1] == $strTwo[$j - 1]) {
                $arrTwo[$i][$j] = $arrTwo[$i - 1][$j - 1] + 1;
                $arrOne[$i][$j] = 1;
            } else {
                if ($arrTwo[$i - 1][$j] >= $arrTwo[$i][$j - 1]) {
                    $arrTwo[$i][$j] = $arrTwo[$i - 1][$j];
                    $arrOne[$i][$j] = 2;
                } else {
                    $arrTwo[$i][$j] = $arrTwo[$i][$j - 1];
                    $arrOne[$i][$j] = 3;
                }
            }
        }
    }
    return $arrTwo;
}
function Lcs($i, $j, $strOne, $arrOne) {
    if ($i == 0 || $j == 0) return ;
    //判断$arrOne进入不同的分支
    if ($arrOne[$i][$j] == 1) {
        Lcs($i - 1, $j - 1, $strOne, $arrOne);
        echo $strOne[$i - 1];
    } else {
        ($arrOne[$i][$j] == 2) ? Lcs($i - 1, $j, $strOne, $arrOne) : Lcs($i, $j - 1, $strOne, $arrOne);
    }
}
findMaxLcs('ABCBDA', 'BDCABA');