<?php
function printListFormTaiToHead($head)
{
    $list = [];
    while ($head != null)
    {
        array_push($list, $head->val);
        $head = $head->next;
    }
    return array_reverse($list);
}