<?
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
$path_data = [];
$path_list = [];
function FindPath($root, $expectNumber)
{
    global $path_data;
    global $path_list;
    if(empty($root)) return $path_list;
    array_push($path_data, $root->val);          //往数组里添加路径数据
    if($root->left == null && $root->right == null && $expectNumber == $root->val){
        array_push($path_list, array_values($path_data));   //满足条件往路径列表里添加
    }
    if($root->val <= $expectNumber && $root->left != null){
        FindPath($root->left, $expectNumber - $root->val);
    }
    if($root->val <= $expectNumber && $root->right != null){
        FindPath($root->right, $expectNumber - $root->val);
    }
    array_pop($path_data);    //删除最后一个元素
    return $path_list;
}
$node_list = new TreeNode(10);
$five = new TreeNode(5);
$twelve = new TreeNode(12);
$node_list->left = $five;
$node_list->right = $twelve;
$four = new TreeNode(4);
$seven = new TreeNode(7);

$five->left = $four;
$five->right = $seven;
var_dump(FindPath($node_list,15));