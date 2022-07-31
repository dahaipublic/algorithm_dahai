<?php

/**
 * 字符串相乘
 * 给定两个以字符串形式表示的非负整数num1和num2，返回num1和num2的乘积，它们的乘积也表示为字符串形式。
 *
 * 注意：不能使用任何内置的 BigInteger 库或直接将输入转换为整数。
 *
 * 示例 1:
 *
 * 输入: num1 = "2", num2 = "3"
 * 输出: "6"
 * 示例2:
 *
 * 输入: num1 = "123", num2 = "456"
 * 输出: "56088"
 */

class Solution
{

    /**
     * @param String $num1
     * @param String $num2
     *
     * @return String
     */
    function multiply($num1, $num2)
    {
        if (empty($num1) || empty($num2)) return '0';
        $m = strlen($num1);
        $n = strlen($num2);
        for ($i = 1; $i <= $m + $n + 1; $i++) {
            $array[$i] = '0';
        }
        for ($i = $m - 1; $i >= 0; $i--) {
            for ($j = $n - 1; $j >= 0; $j--) {
                $array[$i + $j + 1] += $num1[$i] * $num2[$j];
            }
        }
        $str = '';
        for ($i = $m + $n - 1; $i >= 0; $i--) {
            if ($array[$i] > 9) {
                $array[$i - 1] += floor($array[$i] / 10);
                $array[$i]     %= 10;
            }
            $str = (string)$array[$i] . $str;
        }
        return $str;
    }

    /**
     * @param String $num1
     * @param String $num2
     *
     * @return String
     */
    function multiplyOne($num1, $num2)
    {
        return bcmul($num1, $num2) . '';
    }
}