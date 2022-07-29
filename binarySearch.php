<?php
/**
 * 二分查找法
 */
function binarySearch($arr, $target)
{
//定义开始和结束的下标
    $start = 0;
    $end = count($arr) - 1;
//循环
    while ($start <= $end) {
//取中间值
        $mid = floor(($start + $end) / 2);
        if ($arr[$mid] == $target) {
            return $mid;
        }
//查询的数小，往左继续查找
        if ($arr[$mid] > $target) {
            $end = $mid - 1;
        }
//查询的数大，往右继续查找
        if ($arr[$mid] < $target) {
            $start = $mid + 1;
        }
    }
}
//定义一个数组
$arr = [1,11,43,54,62,21,66,32,78,36,76,39];
echo binarySearch($arr, 11);