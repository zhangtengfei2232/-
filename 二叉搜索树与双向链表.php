<?php
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function Convert($pRootOfTree)
{
    if(empty($pRootOfTree)) return null;
    if($pRootOfTree->left == null && $pRootOfTree->right == null) return $pRootOfTree;
    //将左子树构造成双向链表，并且返回该链表头结点left,
    $left = Convert($pRootOfTree->left);
    //定位到左子树链表的最后一个结点（左子树最右边的节点）
    $temp = $left;     //创建一个临时节点，用来遍历找到左链表的最后一个结点（左子树最右边的结点），$temp初始化指向左子树的根节点。
    while ($temp != null && $temp->right != null) $temp = $temp->right;
    //如果左子树链表不为空，将当前root追加到左子树链表后
    if ($left != null){     //左子树不为空
        $temp->right = $pRootOfTree;//左子树链表的最后一个节点p（左子树最右边节点）的右指针指向当前root节点
        $pRootOfTree->left = $temp;//当前root节点的左指针指向左子树链表的最后一个节点p（左子树最右边节点）
    }
    //将右子树构造成双链表，并返回该链表的头结点right
    $right = Convert($pRootOfTree->right);
    //如果右子树链表不为空，将右链表追加到根节点后
    if ($right != null){
        $right->left = $pRootOfTree;
        $pRootOfTree->right = $right;
    }
    return $left != null ? $left : $pRootOfTree;
}