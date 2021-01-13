<?php

/**
 * Class BM
 * 算法核心思想
 *
 *
 * 相关网址：
 * https://www.cnblogs.com/wxgblogs/p/5701101.html
 * http://www.ruanyifeng.com/blog/2013/05/boyer-moore_string_search_algorithm.html
 */

class BM
{
    public function execute($mainStr, $patternStr)
    {
        //坏字符应该移动的下标
        $bmBc = array();
        //当前字符是好后缀应该移动的长度
        $bmGs = array();
        //主串'utf-8'编码总长度
        $mainStrLen = mb_strlen($mainStr, 'UTF-8');
        //模式串'utf-8'编码总长度
        $patternStrLen = mb_strlen($patternStr, 'UTF-8');
        //当前匹配主串的下标
        $matchMainIndex = 0;
        //当前匹配模式串的下标
        $matchPatternIndex = 0;
        $mainStrChar = '';
        $tempMatchPatternIndex = '无';

        self::preBmBc($patternStr, $patternStrLen, $bmBc);

        self::preBmGs($patternStr, $patternStrLen, $bmGs);

        //主串剩余字符个数大于模式串,继续匹配
        while ($matchMainIndex <= $mainStrLen - $patternStrLen) {
            $matchPatternIndex = $patternStrLen - 1;
            while ($matchPatternIndex > 0) {
                $patternStrChar = mb_substr($patternStr, $matchPatternIndex, 1, 'UTF-8');

                //当前匹配主串下标
                $tempMatchPatternIndex = $matchPatternIndex + $matchMainIndex;
                //获取主串匹配的字符
                $mainStrChar = mb_substr($mainStr, $tempMatchPatternIndex, 1, 'UTF-8');
                //不相等,停止匹配,找主串移动长度
                if ($patternStrChar != $mainStrChar) {
                    break;
                }
                else {
                    $matchPatternIndex--;
                }
            }

            //找到模式串
            if ($matchPatternIndex <= 0) {
                echo '匹配成功' . ' 主串下标: ' . $matchMainIndex . "\n";
                $matchMainIndex += $bmGs[0];
            }
            else {
                $tempBmBcIndex = isset($bmBc[$mainStrChar]) ? $bmBc[$mainStrChar] - $patternStrLen + 1 + $matchPatternIndex : $matchPatternIndex + 1;
                $matchMainIndex += max($bmGs[$matchPatternIndex], $tempBmBcIndex);
            }
        }
    }

    /**
     * @param $patternStr string 模式串
     * @param $patternStrLen int 模式串长度 'utf-8'
     * @param $bmBc
     */
    public static function preBmBc($patternStr, $patternStrLen, &$bmBc)
    {
        for ($index = 0; $index < $patternStrLen; $index++)
        {
            //取出当前字符
            $patternStrChar = mb_substr($patternStr, $index, 1, 'UTF-8');
            //一直迭代记录当前字符在字符串中的下标,后面重复出现,只保留最后一次出现的位置
            $bmBc[$patternStrChar] = $patternStrLen - 1 - $index;
        }
    }

    /**
     * @param $patternStr string 模式串
     * @param $patternStrLen int 模式串长度
     * @param $suffixes array 模式串中每个字符和模式串本身从后向前匹配的最大长度
     */
    public static function suffixes($patternStr, $patternStrLen, &$suffixes)
    {
        //初始化最后一个字符的好后缀的前缀为字符串本身长度
        $suffixes[$patternStrLen - 1] = $patternStrLen;
        //下标最大值
        $indexLen = $patternStrLen - 1;
        for ($index = $patternStrLen - 2; $index >= 0; $index--) {
            //匹配下标先赋值为当前字符下标
            $matchPreLen = $index;

            while ($matchPreLen >= 0) {
                //获取当前匹配下标的字符
                $currentChar = mb_substr($patternStr, $matchPreLen, 1, 'UTF-8');

                //当前匹配的模式串尾部下标
                $patternStrIndex = $indexLen - $index + $matchPreLen;
                //获取要和模式串末尾匹配的字符
                $patternStrChar = mb_substr($patternStr, $patternStrIndex, 1, 'UTF-8');

                //遇到不相等的,退出循环
                if ($currentChar != $patternStrChar) {
                    break;
                }
                //匹配下标往前移一位
                $matchPreLen--;
            }
            //记录当前字符向前依次和模式串末尾比较,匹配的长度
            $suffixes[$index] = $index - $matchPreLen;

        }
    }

    /**
     * @param $patternStr string 模式串
     * @param $patternStrLen int 模式串长度
     * @param $bmGs array 当前字符是好后缀应该移动的长度
     */
    public static function preBmGs($patternStr, $patternStrLen, &$bmGs)
    {
        //模式串中每个字符和模式串本身从后向前匹配的最大长度
        $suffixes = array();
        self::suffixes($patternStr, $patternStrLen, $suffixes);

        //初始化好后缀移动长度为字符串总长度
        for ($index = 0; $index < $patternStrLen; $index++) {
            $bmGs[$index] = $patternStrLen;
        }
        //当前已经被'记录好后缀移动长度的字符'下标
        $preCurrentGoodStrIndex = 0;
        //从后向前记录,保证记录的是最大移动长度===>注意看下面的第二个for循环
        for ($index = $patternStrLen - 1; $index >= 0; $index--) {
            //如果当前字符满足 从当前字符一直到字符串最开始的位置倒着和模式串匹配完全匹配,证明当前字符有前缀串
            if ($suffixes[$index] == $index + 1) {
                //从前到当前字符下标,记录好后缀字符移动的长度
                for (; $preCurrentGoodStrIndex < $patternStrLen - 1 - $index; $preCurrentGoodStrIndex++) {
                    //之前没有记录过的好后缀字符才记录
                    if ($bmGs[$preCurrentGoodStrIndex] == $patternStrLen) {
                        $bmGs[$preCurrentGoodStrIndex] = $patternStrLen - 1 - $index;
                    }
                }
            }
        }
        //好后缀在模式串中出现过,记录移动长度
        for ($index = 0; $index < $patternStrLen - 1; $index++) {
            $bmGs[$patternStrLen - 1 - $suffixes[$index]] = $patternStrLen - 1 - $index;
        }
    }


}
$startTime = time();
$objBM = new BM();
$objBM->execute('HERE IS A SIMPLE EXAMPLE', 'IS A SIMPLE EXAMPLE');
$endTime = time();
echo '脚本执行耗时: ' . ($endTime - $startTime) . 's';