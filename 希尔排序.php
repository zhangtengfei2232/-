<?php
function hillSort($rotateArray)
{
    for($r = intval(count($rotateArray) / 2); $r >= 1; $r = intval($r / 2)){
        for($i = $r; $i < count($rotateArray); $i++){
            $temp = $rotateArray[$i];
            $j = $i - $r;
            while ($j >= 0 && $temp < $rotateArray[$j]){
                $rotateArray[$j + $r] = $rotateArray[$j];
                $j -= $r;
            }
            $rotateArray[$j + $r] = $temp;
        }
        var_dump($rotateArray);
    }
}
hillSort([-5,35,9,15,8]);