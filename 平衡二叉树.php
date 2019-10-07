<?php
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
$is_balance = true;
function IsBalanced_Solution($pRoot)
{
    if($pRoot == null) return true;
    global $is_balance;
    $is_balance = true;
    isBalance($pRoot);
    return $is_balance;
}
function isBalance($root)
{
    global $is_balance;
    if($root == null || !$is_balance) return 0;
    $left_height = isBalance($root->left);                  //往左子树进行深入遍历
    $right_height = isBalance($root->right);                //往右子树进行深入遍历
    if(abs($left_height- $right_height) > 1) $is_balance = false; //差值超过1 直接返回，更改$is_balance = false
    return max($left_height, $right_height) + 1;                    //返回左右子树中最深的作为上一层的结点中孩子深度
}