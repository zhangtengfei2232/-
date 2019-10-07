<?php
/**思路：  谁先走到头，谁就指向另一个链表的头部。第二个走完的，指向另一个链表的头部。
 * 等两者都更换完头部，这个时候就能 "一起从同一长度" 开始进行比较
 * @param $pHead1
 * @param $pHead2
 * @return mixed
 */
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function FindFirstCommonNode($pHead1, $pHead2)
{
    $one_node = $pHead1;
    $two_node = $pHead2;
    while ($one_node != $two_node){
        $one_node = ($one_node == null) ? $pHead2 : $one_node->next;
        $two_node = ($two_node == null) ? $pHead1 : $two_node->next;
    }
    return $one_node;
}