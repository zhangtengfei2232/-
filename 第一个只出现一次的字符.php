<?

function FirstNotRepeatingChar($str)
{
    if($str == null) return -1;
    $char_data = str_split($str);
    $len = count($char_data);

    //方法一：
    $status = [];
    for($i = 0; $i < $len; $i++){
        $status[$char_data[$i]]++;      //后续有相同的直接+1
    }
    for($i = 0; $i < $len; $i++) {
        if($status[$char_data[$i]] == 1) return $i;   //只出现一次的直接 返回位置
    }
    //方法二：
//    $data = [[]];
//    for($i = 0; $i < $len; $i++){
//        $data[0][$i] = $char_data[$i];
//        $data[1][$i] = 0;
//    }
//    for($i = 0; $i < $len; $i++){
//        if($data[1][$i]) continue;       //下面的比较已经改变了后续的状态
//        $data[1][$i] = 1;                //已比较，改变状态
//        $j = $i + 1;
//        for( ; $j < $len; $j++){
//            if(! $data[1][$j]){          //没有比较过
//                if($data[0][$i] == $data[0][$j]){
//                    $data[1][$j] = 1;        //已比较和以前的相等，下次不再比较，改变状态
//                    break;
//                }
//            }
//        }
//        if($j == $len && $data[0][$i] != $data[0][$i - 1]) return $i;
//    }
    return -1;
}

var_dump(FirstNotRepeatingChar(""));