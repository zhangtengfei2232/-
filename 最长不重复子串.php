<?php

function findMaxStringLength($str){
    if ($str == null || $str === "") return '不合法的字符串';
    $maxLength = 0;                                 //最大长度
    $currentLength = 0;                             //当前字符前面的不重复子串长度
    $position = array();
    for ($i = 0; $i < 26; $i++) {
        $position[$i] = -1;                         //初始化为-1，负数表示没出现过
    }
    for ($i = 0; $i < strlen($str); $i++) {
        $char = ord($str[$i]) - ord('a');
        $prePosition = $position[$char];
        //计算当前字符与它上次出现位置之间的距离
        $distance = $i - $prePosition;
        //当前字符第一次出现，或者前一个非重复子字符串中没有包含当前字符
        if ($prePosition < 0 || $distance > $currentLength) {
            $currentLength++;
        } else {
            //如果当前长度大于最大长度，更新
            if ($currentLength > $maxLength) {
                $maxLength = $currentLength;
            }
            $currentLength = $distance;
        }
        //更新字符出现的位置
        $position[$char] = $i;
    }
    if ($currentLength > $maxLength) {
        $maxLength = $currentLength;
    }
    return $maxLength;
}