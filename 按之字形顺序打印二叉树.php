<?php

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function MyPrint($pRoot)
{
    if (empty($pRoot)) return [];
    $queue = [];
    $result = [];
    array_push($queue, $pRoot);
    $is_single = true;
    while (! empty($queue)) {
        $temp = [];
        $size = count($queue);
        while ($size--) {
            $temp_node = array_shift($queue);       //取第一个
            array_push($temp, $temp_node->val);
            if($temp_node->left) array_push($queue, $temp_node->left);
            if($temp_node->right) array_push($queue, $temp_node->right);
        }
        if(! $is_single) $temp = array_reverse($temp);  //如果是双行，进行翻转，倒序从右到左输出
        $is_single = ! $is_single;
        array_push($result, $temp);
    }
    return $result;
}
$root = new TreeNode(8);
$six = new TreeNode(6);
$ten = new TreeNode(10);
$root->left = $six;
$root->right = $ten;
$five = new TreeNode(5);
$seven = new TreeNode(7);
$six->left = $five;
$six->right = $seven;
$nine = new TreeNode(9);
$el = new TreeNode(11);
$ten->left = $nine;
$ten->right = $el;
var_dump(MyPrint($root));