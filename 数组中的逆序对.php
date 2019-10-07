<?php

function InversePairs($data)
{
    $count = 0;
    if($data != null) divideGroup($data, 0, count($data) - 1, $count);
    return $count % 1000000007;
}
function divideGroup(&$data, $start, $end, &$count)
{
    if($start >= $end) return;                      //分到每组
    $mid = ($start + $end) >> 1;
    divideGroup($data, $start, $mid, $count);       //左分
    divideGroup($data, $mid + 1, $end, $count);     //右分
    mergeGroup($data, $start, $mid, $end, $count);  //合并
}
function mergeGroup(&$data, $start, $mid, $end, &$count)
{
    $i = $start; $j = $mid + 1; $k = 0;
    $temp = [];
    while ($i <= $mid && $j <= $end){
        if($data[$i] <= $data[$j]){
            $temp[$k++] = $data[$i++];
            continue;
        }
        $temp[$k++] = $data[$j++];
        $count += $mid - $i + 1;                        //如果前面的数字比后面的数字大，满足逆序对
        $count %= 1000000007;
    }
    while ($i <= $mid) $temp[$k++] = $data[$i++];      //归并到最后，发现左边还有剩余
    while ($j <= $end) $temp[$k++] = $data[$j++];      //归并到最后，发现右边还有剩余
    for($x = 0; $x < count($temp); $x++) $data[$start + $x] = $temp[$x];
}
var_dump(InversePairs([364,637,341,406,747,995,234,971,571,219,993,407,416,366,315,301,601,650,418,355,460,505,360,965,516,648,727,667,465,849,455,181,486,149,588,233,144,174,557,67,746,550,474,162,268,142,463,221,882,576,604,739,288,569,256,936,275,401,497,82,935,983,583,523,697,478,147,795,380,973,958,115,773,870,259,655,446,863,735,784,3,671,433,630,425,930,64,266,235,187,284,665,874,80,45,848,38,811,267,575]));