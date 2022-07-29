<?php

/**
 * 给你一个字符串 s，找到 s 中最长的回文子串。
 * 示例 1：
 *
 * 输入：s = "babad"
 * 输出："bab"
 * 解释："aba" 同样是符合题意的答案。
 * 示例 2：
 *
 * 输入：s = "cbbd"
 * 输出："bb"
 *
 * 提示：
 *
 * 1 <= s.length <= 1000
 * s 仅由数字和英文字母组成
 */
class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $m = count($nums1);
        $n = count($nums2);
        //如果$m>$n时，后面的$j会可能小于0。也就是上面提到的不等式（ t =（int)(m+n+1)/2。j = t - i.）
        if ($m > $n) return $this->findMedianSortedArrays($nums2, $nums1);

        $t = (int)(($m + $n + 1) / 2);
        $i = 0;
        $j = 0;

        /** 要理解清楚下面两组max，min的意思 */
        $leftMax = 0;//左边数组的最大值
        $rightMin = 0;//右边数组的最小值
        $iMax = $m;//二分法的右边界
        $iMin = 0;//二分法的左边界

        while ($iMax >= $iMin) {
            //二分法
            $i = (int)(($iMax + $iMin) / 2);
            $j = $t - $i;
            if ($i > 0 && $j < $n && $nums1[$i - 1] > $nums2[$j]) {//利用数组有序，可以只比较一次
                $iMax = $i - 1;
            } elseif ($j > 0 && $i < $m && $nums1[$i] < $nums2[$j - 1]) {//利用数组有序，可以只比较一次
                $iMin = $i + 1;
            } else {//二分到最后 最佳位置
                if ($i == 0) {
                    $leftMax = $nums2[$j - 1];
                } elseif ($j == 0) {
                    $leftMax = $nums1[$i - 1];
                } else {
                    $leftMax = max($nums2[$j - 1], $nums1[$i - 1]);
                }
                if (($m + $n) % 2 == 1) {//数组和是奇数
                    return $leftMax;
                }
                //数组和是奇数
                if ($i == $m) {
                    $rightMin = $nums2[$j];
                } elseif ($j == $n) {
                    $rightMin = $nums1[$i];
                } else {
                    $rightMin = min($nums2[$j], $nums1[$i]);
                }
                return ($leftMax + $rightMin) / 2;
            }
        }
    }
}

$nums1 = [1, 2];
$nums2 = [3];
$s = (new Solution())->findMedianSortedArrays($nums1, $nums2);
var_dump($s);