<?php
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function reConstructBinaryTree($pre, $vin)
{
   return  reConstruct($pre, 0, count($pre) - 1, $vin, 0, count($vin) - 1);
}

function reConstruct($pre, $start_pre, $end_pre, $vin, $start_vin, $end_vin)
{
    if($start_pre > $end_pre || $start_vin > $end_vin){
        return null;
    }
    $root = new TreeNode($pre[$start_pre]);                //首先找到根节点
    for($i = $start_vin; $i <= $end_vin; $i++){            //找出中间根节点索引
        if($vin[$i] == $pre[$start_pre]){                  //找到之后，分别对左子树和右子树进行递归算法，重复此步骤
            $root->left  = reConstruct($pre, $start_pre + 1, $start_pre + $i - $start_vin, $vin, $start_vin, $i - 1);
            $root->right = reConstruct($pre, $start_pre + $i - $start_vin + 1, $end_pre, $vin, $i + 1, $end_vin);
            break;
        }
    }
    return $root;
}