<?php


class Solution
{
    /**
     * 暴力破解
     *
     * @param $nums
     * @param $targer
     *
     * @return array|int[]
     */
    function twoSumLj($nums, $targer)
    {
        if (!is_array($nums)) {
            return [];
        }
        for ($i = 0; $i < count($nums); $i++) { // 先把所有值拿出来
            for ($j = $i + 1; $j < count($nums); $j++) {
                if ($nums[$j] == $targer - $nums[$i]) { // 用到了简单的运算 即可
                    return [$i, $j];
                }
            }
        }
        return [];
    }

    /**
     * 优化破解
     *
     * @param $nums
     * @param $target
     *
     * @return array|void
     */
    function twoSum($nums, $target)
    {
        $hashMap = [];
        foreach ($nums as $k => $v) {
            var_dump($hashMap);
            if (array_key_exists($target - $v, $hashMap)) {
                return [$k, $hashMap[$target - $v]];
            }
            $hashMap[$v] = $k;
        }
    }

}

$solution = new Solution();
$nums     = [2, 7, 11, 15];
$target   = 26;
$twoSum   = $solution->twoSum($nums, $target);
var_dump($twoSum);