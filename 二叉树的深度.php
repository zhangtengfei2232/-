<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

//$depth = 0;
function TreeDepth($pRoot)
{
    if($pRoot == null) return 0;
    //方法一：
    $node_data = [];
    array_unshift($node_data, $pRoot);                //往数组开头添加元素
    $depth = 0;
    while (! empty($node_data)){
        $size = count($node_data);                    //当前层数的结点
        $depth++;
        while ($size--){
            $temp_node = array_pop($node_data);      //弹出数组第一个元素
            if($temp_node->left) array_unshift($node_data, $temp_node->left);
            if($temp_node->right) array_unshift($node_data, $temp_node->right);
        }
    }
    return $depth;
//    //方法二:利用递归
//    global $depth;
//    $depth = 0;          //避免测试用例
//    search($pRoot, 0);
//    return $depth + 1;
}
//function search($node, $temp_depth)
//{
//    global $depth;
//    if($node == null){
//        if($depth < $temp_depth) $depth = $temp_depth;
//        return ;
//    }
//    if($node->left || $node->right){    //当前层有结点
//        $temp_depth++;
//        search($node->left, $temp_depth);
//        search($node->right, $temp_depth);
//    }
//}