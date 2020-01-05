<?php

function getMaxLengthStr($strOne, $strTwo)
{
    $dp = array(array());
    $length = 0;
    $maxEnd = 0;
    for ($i = 0; $i < strlen($strOne); $i++) {
        for ($j = 0; $j < strlen($strTwo); $j++) {
            //如果相等
            if ($strOne[$i] == $strTwo[$j]) {
                $dp[$i][$j] = ($i > 0 && $j > 0) ? $dp[$i - 1][$j - 1] + 1 : 1;
                if ($dp[$i][$j] > $length) {
                    $length = $dp[$i][$j];
                    $maxEnd = $j;
                }
            } else {
                $dp[$i][$j] = 0;
            }
        }
    }
    echo mb_substr($strTwo, $maxEnd - $length + 1, $length);
}

getMaxLengthStr('123ABCD4567', 'ABE12345D6');
