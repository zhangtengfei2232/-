<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function MyPrint($pRoot)
{
    if ($pRoot == null) return [];
    $result = [];
    $queue = [];
    array_push($queue, $pRoot);
    while (! empty($queue)) {
        $temp = [];
        $size = count($queue);
        while ($size--) {
            $temp_node = array_shift($queue);
            array_push($temp, $temp_node->val);
            if($temp_node->left) array_push($queue, $temp_node->left);
            if($temp_node->right) array_push($queue, $temp_node->right);
        }
        array_push($result, $temp);
    }
    return $result;
}