<?php
function Find($target, $array)
{
    foreach ($array as $key => $value){
        if($target >= $array[$key][0] && $target <= $array[$key][count($array[$key]) - 1]){
            foreach ($array[$key] as $index => $item){
                if($item == $target) return true;
            }
        }
    }
    return false;
}
var_dump(Find(5,[[1,2,8,9],[2,4,9,12],[4,7,10,13],[6,8,11,15]]));