<?php

class TreeLinkNode {
    var $val;
    var $left = NULL;
    var $right = NULL;
    var $next = NULL;
    function __construct($x) {
        $this->val = $x;
    }
}
function GetNext($pNode)
{
    //有右孩子，循环遍历右孩子的左结点
    if ($pNode->right != null) {
        $pNode = $pNode->right;
        while ($pNode->left != null) $pNode = $pNode->left;
        return $pNode;
    }
    //右孩子为空,是父节点的右孩子
    //返回上一层的父节点，如果父结点的右孩子结点就是当前结点，继续返回上一层的父结点...直到父结点的左孩子结点等于当前结点
    while ($pNode->next != null && $pNode->next->right == $pNode) $pNode = $pNode->next;
    //父节点的左孩子结点等于当前结点，说明下一个要遍历的结点就是父节点了或者父节点为空（当前结点为root），还是返回父结点（null）
    //$pNode->next == null 或者 $pNode->next->left = $pNode
    return $pNode->next;
}