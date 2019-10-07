<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
//算法思想，中序遍历
function KthNode($pRoot, $k)
{
    if ($pRoot == null || $k <= 0) return null;
    //方法一：递归实现
//    return findNode($pRoot, $k);
    //方法二：非递归实现
    $node_data = [];
    $node = null;
    while ($pRoot != null || ! empty($node_data)) {
        while ($pRoot != null) {                  //左分支，先压入栈
            array_push($node_data, $pRoot);
            $pRoot = $pRoot->left;
        }
        $temp_node = array_pop($node_data);       //弹出来
        $k--;
        if ($k == 0) $node = $temp_node;
        $pRoot = $temp_node->right;
    }
    return $node;
}
function findNode($root, &$k)
{
    if ($root == null) return null;
    $temp_node = findNode($root->left, $k);
    if ($k == 0) return $temp_node;
    $k--;
    if ($k == 0) return $root;
    return findNode($root->right, $k);
}
