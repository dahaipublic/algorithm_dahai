<?php

/**
 * 给出一个字符串，返回里面连续字母的个数，比如：abbcddde,返回 1a2b1c3de;
 */

function organize($str)
{
    $re = '';
    $arr = str_split($str);//把字符串变成数组，开始我想到的是用for循环来处理，这个函数同事提醒了才发现
    $key = 0; //key 用来记录下标，为了方便计算前面的数字
    for ($i = 0; $i < count($arr); $i++) {
        $v = $arr[$i];
        if ($arr[$i] == $arr[$i+1]) {
            continue;//如果当前的值和下一个值相等，跳出当前循环，进入下一个
        } else {
            $re .= ($i - $key + 1) . $v; //不相等时计算出前面的数字，
            $key = $i + 1;// 同时 key 下标重新复制
        }
    }

    return $re;
}

$str = "abbcddde";

print_r(organize($str));
print_r(organize($str));
print_r(organize($str));