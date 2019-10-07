<?php

$stack_one = [];
$stack_two = [];
function mypush($node)
{
    global $stack_one;
    $stack_one [] = $node;
}
function mypop()
{
    global $stack_one;
    global $stack_two;
    if(empty($stack_two)){      //必须每次要判断此栈2是否为空，保证此次栈中的数据全部出来，再往里面添加
        while (count($stack_one) > 0) array_push($stack_two, array_pop($stack_one));
    }
    if(empty($stack_two)) return null;
    return array_pop($stack_two);
}
