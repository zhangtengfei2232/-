<?php

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
//递归写法
function Merge1($pHead1, $pHead2){
    if(empty($pHead1)) return $pHead2;
    if(empty($pHead2)) return $pHead1;
    if($pHead1->val < $pHead2->val){
        $new_node = $pHead1;
        $new_node->next = Merge($pHead1->next, $pHead2);
    }else{
        $new_node = $pHead2;
        $new_node->next = Merge($pHead1, $pHead2->next);
    }
    return $new_node;
}
//循环写法
function Merge2($pHead1, $pHead2)
{
    $head = new ListNode(null);
    $new_node = $head;
    while (!empty($pHead1) && !empty($pHead2)){
        if($pHead1->val < $pHead2->val){
            $new_node->next = $pHead1;
            $new_node = $pHead1;
            $pHead1 = $pHead1->next;
            continue;
        }
        $new_node->next = $pHead2;
        $new_node = $pHead2;
        $pHead2 = $pHead2->next;
    }
    (empty($pHead2)) ? $new_node->next = $pHead1 : $new_node->next = $pHead2;
    return $head->next;
}