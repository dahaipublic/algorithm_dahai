<?php


function test($arr, $num)
{
    $start = 0;
    $end = count($arr) - 1;
    while ($start <= $end) {
        $mid = floor(($start + $end) / 2);
        if ($arr[$mid] == $num) {
            return $mid;
        }

        if ($arr[$mid] > $num) {
            return $end = $mid - 1;
        }
        if ($arr[$mid] < $num) {
            return $start = $mid + 1;
        }
    }
}

//定义一个数组
$arr = [1, 11, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39];
echo test($arr, 11);