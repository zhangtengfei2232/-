<?php

function PrintFromTopToBottom($root)
{
    $node_list = [];
    $data_list = [];
    if(empty($root)) return [];
    array_push($node_list, $root);
    while (! empty($node_list)) {
        $temp = array_shift($node_list);
        array_push($data_list, $temp->val);
        if(! empty($temp->left))  array_push($node_list, $temp->left);
        if(! empty($temp->right)) array_push($node_list, $temp->right);
    }
    return $data_list;
}