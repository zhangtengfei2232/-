<?php

function Sum_Solution($n)
{
    //利用&&短路原理
    $n && ($n += Sum_Solution($n - 1));
    return $n;
}