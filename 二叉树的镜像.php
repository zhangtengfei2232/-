<?php

function Mirror(&$root)
{
    if(empty($root)) return false;
    return swapChild($root);
}
//递归交换左右孩子
function swapChild($root)
{
    if(empty($root)) return $root;
    $temp = swapChild($root->left);
    $root->left = swapChild($root->right);
    $root->right = $temp;
    return $root;
}