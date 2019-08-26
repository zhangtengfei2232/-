<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

function HasSubtree($pRoot1, $pRoot2)
{
    if(empty($pRoot1)) return false;
    if($pRoot1->val == $pRoot2->val) if(isContain($pRoot1, $pRoot2)) return true;
    return (! HasSubtree($pRoot1->left, $pRoot2)) ? (HasSubtree($pRoot1->right, $pRoot2)) ? true : HasSubtree($pRoot1->right, $pRoot2) : true;
}
function isContain($pRoot1, $pRoot2)
{
    if(empty($pRoot2)) return true;
    if(empty($pRoot1) && ! empty($pRoot2)) return false;
    return ($pRoot1->val == $pRoot2->val) ? isContain($pRoot1->left, $pRoot2->left) && isContain($pRoot1->right, $pRoot2->right): false;
}
