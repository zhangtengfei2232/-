<?php

function VerifySquenceOfBST($sequence)
{
    return (count($sequence) === 0) ? false : isTreeBST($sequence, 0, count($sequence) - 1);
}
function isTreeBST($sequence, $start, $end)
{
    if($end <= $start) return true;
    $index = $start;
    for(; $index < $end; $index++)                         //左子树
        if($sequence[$index] > $sequence[$end]) break;     //找到分界点
    for($j = $index; $j < $end; $j++){                     //右子树
        if($sequence[$j] < $sequence[$end]) return false;  //发现有小于根节点的，返回false
    }
    return isTreeBST($sequence, $start, $index - 1) && isTreeBST($sequence, $index, $end - 1);

}
VerifySquenceOfBST([4,8,6,12,16,14,10]);