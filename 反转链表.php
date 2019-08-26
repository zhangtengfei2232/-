<?php

function ReverseList($pHead)
{
    if($pHead == null) return null;
    $pre_node = null;
    while ($pHead != null){
        $next_node   = $pHead->next;
        $pHead->next = $pre_node;
        $pre_node    = $pHead;
        $pHead       = $next_node;
    }
    return $pre_node;

}