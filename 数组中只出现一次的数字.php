<?php
/**
 * @param $array
 * @return array
 * 思路一：
 * 首先：位运算中异或的性质：两个相同数字异或=0，一个数和0异或还是它本身。
 * 当只有一个数出现一次时，我们把数组中所有的数，依次异或运算，最后剩下的就是落单的数，因为成对儿出现的都抵消了。
 * 依照这个思路，我们来看两个数（我们假设是AB）出现一次的数组。我们首先还是先异或，剩下的数字肯定是A、B异或的结果，
 * 这个结果的二进制中的1，表现的是A和B的不同的位。我们就取第一个1所在的位数，假设是第3位，接着把原数组分成两组，
 * 分组标准是第3位是否为1。如此，相同的数肯定在一个组，因为相同数字所有位都相同，
 * 而不同的数，肯定不在一组。然后把这两个组按照最开始的思路，依次异或，剩余的两个结果就是这两个只出现一次的数字。
 * 思路二：
 * HashMap  key(数字) => value(出现的次数)
 */
function FindNumsAppearOnce($array)
{
    $len  = count($array);
    if($len == 2) return $array;
    $xor = 0;
    $result = [];
    foreach ($array as $key => $value) $xor ^= $value;
    $index = 1;
    var_dump($xor);
    while (($xor & $index) == 0) $index <<= 1;   //每次左移1位，从右开始找，找到第一个为1的位置停止,//(1，10,100,1000)
    for ($i = 0; $i < $len; $i++){
        (($array[$i] & $index) == 0) ? $result[0] ^= $array[$i] : $result[1] ^= $array[$i];
    }
    return $result;
}
var_dump(FindNumsAppearOnce([1,1,3,16,24,3]));