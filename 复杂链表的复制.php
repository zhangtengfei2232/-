<?php

function MyClone($pHead)
{
    if($pHead == null) return null;
    $temp = new RandomListNode($pHead->label);
    $my_head = $temp;
    if ($pHead->random != null) $temp->random = new RandomListNode($pHead->random->label);
    while ($pHead->next != null){
        $pHead = $pHead->next;
        $temp->next = new RandomListNode($pHead->label);
        if($pHead->random != null) $temp->next->random = new RandomListNode($pHead->random->label);
        $temp = $temp->next;
    }
    return $my_head;
}