<?php

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function MySerialize($pRoot)
{
    if ($pRoot == null) return "";
    $string = "";
    serializeStr($pRoot, $string);
    return $string;
}
function serializeStr($node, &$string)
{
    if ($node == null) {
        $string .= "#,";
        return;
    }
    $string .= ($node->val . ',');       //方便','分割
    serializeStr($node->left, $string);
    serializeStr($node->right, $string);
}
function MyDeserialize($s)
{
    if (strlen($s) == 0) return null;
    $index = -1;
    return deserialize(explode(',', $s), $index);
}
function deserialize($str_data, &$index)
{
    $index++;
    if ($index >= count($str_data)) return null;
    if ($str_data[$index] == "#") return null;
    $temp_node = new TreeNode(0);
    $temp_node->val = $str_data[$index] - '0';
    $temp_node->left = deserialize($str_data, $index);   //调用顺序先左后右，和index值控制左子树和右子树
    $temp_node->right = deserialize($str_data, $index);
    return $temp_node;
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
$ste = MySerialize($root);
var_dump($ste);
var_dump(MyDeserialize($ste));