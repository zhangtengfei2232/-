<?php

function match($s, $pattern)
{
    if($s[0] == " " && $pattern[0] == " ") return true;   //两个都空
    if($pattern[0] == " ") return false;
    return matchStr($s, $pattern, 0, 0);
}
function matchStr($s, $pattern, $s_index, $p_index)
{
    if($s_index == strlen($s) && $p_index == strlen($pattern))  return true;   //两个都比较完了
    if($s_index != strlen($s) && $p_index == strlen($pattern))  return false;  //原字符没结束，模式串已经结束了
    if($p_index + 1 < strlen($pattern) && $pattern[$p_index + 1] == '*'){       //下一个为 '*'并且没有到模式串末尾
        if(($s_index != strlen($s) && $pattern[$p_index] == $s[$s_index]) || ($pattern[$p_index] == '.' && $s_index != strlen($s))) {
            return matchStr($s, $pattern, $s_index + 1, $p_index)         //把'*'当成匹配多个字符，模式串保持当前状态，原字符串后移
                   || matchStr($s, $pattern, $s_index + 1, $p_index + 2)   //把'*'当成匹配一个字符
                   || matchStr($s, $pattern, $s_index, $p_index + 2);     //把'*'当成匹配0个字符
        }
        return matchStr($s, $pattern, $s_index, $p_index + 2);        //把'*'当成匹配0个
    }
    if(($s_index != strlen($s) && $s[$s_index] == $pattern[$p_index]) || ($pattern[$p_index] == '.' && $s_index != strlen($s))){
        return matchStr($s, $pattern, $s_index + 1, $p_index + 1);
    }
    return false;
}
var_dump(match("", "."));