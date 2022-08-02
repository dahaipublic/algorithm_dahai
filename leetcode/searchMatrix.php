<?php

/**
 * 搜索二维矩阵
 * 编写一个高效的算法来判断m x n矩阵中，是否存在一个目标值。该矩阵具有如下特性：
 *
 * 每行中的整数从左到右按升序排列。
 * 每行的第一个整数大于前一行的最后一个整数。
 *
 * 示例 1：
 *
 * 输入：matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
 * 输出：true
 * 示例 2：
 *
 * 输入：matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
 * 输出：false
 *
 * https://leetcode.cn/problems/search-a-2d-matrix/
 */
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer     $target
     *
     * @return Boolean
     */
    // 二分思路
    // 执行用时：12 ms, 在所有 PHP 提交中击败了89.29%的用户
    // 内存消耗：16 MB, 在所有 PHP 提交中击败了25.00%的用户
    function searchMatrix($matrix, $target)
    {
        $m = count($matrix);
        $n = count($matrix[0]);
        if ($m == 0) {
            return false;
        }
        //
        $left  = 0;
        $right = $m * $n - 1;
        // 二分框架
        while ($left <= $right) {
            $mIdx = ($left + $right) >> 1;
            // 二维数组 的坐标 转化为一维数组的 mIdx
            $mItem = $matrix[floor($mIdx / $n)][$mIdx % $n];
            if ($mItem == $target) {
                return true;
            } elseif ($mItem > $target) {
                // 缩小右边界
                $right = $mIdx - 1;
            } else {
                // 缩小左边界
                $left = $mIdx + 1;
            }
        }
        return false;
    }

}


class Solution2
{

    /**
     * @param Integer[][] $matrix
     * @param Integer     $target
     *
     * @return Boolean
     */
    // 缩小领域法
    // 执行用时：16 ms, 在所有 PHP 提交中击败了39.29%的用户
    // 内存消耗：15.9 MB, 在所有 PHP 提交中击败了75.00%的用户
    function searchMatrix($matrix, $target)
    {
        $row = count($matrix);
        $col = count($matrix[0]);
        // 从左下角开始
        $left  = $row - 1;
        $right = 0;

        // 边界范围
        while ($left >= 0 && $right < $col) {
            if ($matrix[$left][$right] > $target) {
                // 向上移动
                $left--;
            } elseif ($matrix[$left][$right] < $target) {
                // 向右移动
                $right++;
            } else {
                // 找到目标值
                return true;
            }
        }
        return false;

    }

}
