<?php
function PrintMinNumber($numbers)
{
    //方法一： PHP 内置排序类似插排
    usort($numbers, function($a, $b) {
        if ("$a$b" > "$b$a") return 1;
        return -1;
    });
    //方法二：
//    $length = count($numbers);
//    for ($i = 0; $i < $length; $i++) {
//        for ($j = 0; $j < $length - 1 - $i; $j++) {
//            $a = $numbers[$j] . $numbers[$j + 1];
//            $b = $numbers[$j + 1] . $numbers[$j];
//            if ($a > $b) {
//                $temp = $numbers[$j];
//                $numbers[$j] = $numbers[$j+1];
//                $numbers[$j + 1] = $temp;
//            }
//        }
//    }
    return implode("",$numbers);
}
PrintMinNumber([12,2,63,3,100]);