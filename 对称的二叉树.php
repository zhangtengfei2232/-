<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function isSymmetrical($pRoot)
{
     if($pRoot == null) return true;
     //方法一：递归
//     return judgeTree($pRoot->left, $pRoot->right);
     //方法二：非递归,栈或者队列，此处我用栈
     $node_data = [];
     array_push($node_data,$pRoot->left,$pRoot->right);
     while (! empty($node_data)) {
         $right_node = array_pop($node_data);
         $left_node  = array_pop($node_data);
         if (($left_node->left ^ $right_node->right) ||
             ($left_node->right ^ $right_node->left) || $left_node->val != $right_node->val) return false;
         if($left_node->left != null && $right_node->right != null) array_push($node_data, $left_node->left, $right_node->right);
         if($left_node->right != null && $right_node->left != null) array_push($node_data, $left_node->right, $right_node->left);
     }
     return true;
}
function judgeTree($left_node, $right_node)
{
    if ($left_node == null && $right_node == null) return true;
    if ($left_node == null || $right_node == null) return false;
    return $left_node->val == $right_node->val && judgeTree($left_node->left, $right_node->right) && judgeTree($left_node->right, $right_node->left);
}