<?php

/**
 * 给你一个按照非递减顺序排列的整数数组 nums，和一个目标值 target。请你找出给定目标值在数组中的开始位置和结束位置。
 *
 * 如果数组中不存在目标值 target，返回[-1, -1]。
 *
 * 你必须设计并实现时间复杂度为O(log n)的算法解决此问题。
 * 示例 1：
 *
 * 输入：nums = [5,7,7,8,8,10], target = 8
 * 输出：[3,4]
 */

class binarySearch
{

    /**
     * @param Integer[] $nums
     * @param Integer   $target
     *
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $len = count($nums);
        if ($len < 1) {     //如果数组为空 返回【-1，-1】
            return [-1, -1];
        }
        $left  = 0;
        $right = $len - 1;
        $flag  = false;             //未找到的标识
        while ($left <= $right) {         //注意left和right是可以相等的
            $mid = floor(($right - $left) / 2) + $left;   //因为数组是排序好的，所以我们取中间数来缩小要查找的范围
            if ($nums[$mid] == $target) {
                $flag = true;             //找到目标数设置找到标识并跳出循环
                break;
            } else if ($nums[$mid] > $target) {    //如果中间数大于目标数的话 说明目标值在 left 到 mid 这个范围内 缩小范围
                $right = $mid - 1;
            } else {
                $left = $mid + 1;         //如果中间数小于目标数的话 说明目标值在 mid 到 right 这个范围内 缩小范围
            }
        }
        if (!$flag) {
            return [-1, -1];      //没找着返回【-1，-1】
        }
        $left = $right = $mid;//left和right为mid分别查找更早和更晚出现的位置，没找到说明数组只有一个目标值，最早最晚出现的位置都是它
        while ($left - 1 >= 0 && $nums[$left - 1] == $target) { //在更早找到的话将位置前移
            $left--;
        }
        while ($right + 1 <= $len - 1 && $nums[$right + 1] == $target) {//在更后找到的话将位置后移
            $right++;
        }
        return [$left, $right];
    }

    function searchRangeOne($nums, $target)
    {
        $re = [-1, -1];
        for ($i = 0; $i <= count($nums); $i++) {
            if ($nums[$i] == $target) {
                if ($re[0] == -1) {
                    $re[0] = $i;
                } else {
                    $re[1] = $i;
                }
            }
        }
        return $re;
    }


    function searchRangeTwo($nums, $target)
    {
        $ans = [-1, -1];
        $pos = self::testSearch($nums, $target);
        if ($pos == -1) return $ans;
        $a = $pos;
        $b = $pos;
        while ($a >= 0 && $nums[$a] == $target) --$a;
        while ($b < count($nums) && $nums[$b] == $target) ++$b;
        $ans[0] = ++$a;
        $ans[1] = --$b;
        return $ans;
    }

    public function testSearch($nums, $target)
    {
        $start = 0;
        $end   = count($nums) - 1;
        while ($start <= $end) {
            $mid = (int)(($start + $end) / 2);
            if ($nums[$mid] == $target) return $mid;
            else if ($nums[$mid] < $target) $start = $mid + 1;
            else $end = $mid - 1;
        }
        return -1;
    }

}


$nums     = [5, 7, 7, 8, 8, 10];
$target   = 8;
$solution = new binarySearch();
$data     = $solution->searchRange($nums, $target);
print_r($data);
