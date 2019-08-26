<?php

function FindKthToTail($head, $k)
{
    if($k <= 0) return null;
    $node_one = $head;
    $node_two = $head;
    //先往后移动k个位置
    for($i = 0; $i < $k - 1; $i++){
        if(empty($node_one)) return null;
        $node_one = $node_one->next;
    }
    if(empty($node_one)) return null;
    while(! empty($node_one->next)){
        $node_one = $node_one->next;
        $node_two = $node_two->next;
    }
    return $node_two;

}