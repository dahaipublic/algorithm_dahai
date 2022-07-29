<?php
/**
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 * 说明：
 * 你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？
 * 示例 1:
 * 输入: [2,2,1]
 * 输出: 1
 * 示例2:
 *
 * 输入: [4,1,2,1,2]
 * 输出: 4
 */

class Solution
{
    function singleNumber($nums)
    {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($map[$nums[$i]])) {
                unset($map[$nums[$i]]);
            } else {
                $map[$nums[$i]] = $nums[$i];
            }
        }
        sort($map);
        return $map[0];
    }


    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    public function singleNumberOne($nums)
    {
        $n   = count($nums);
        $ans = 0;
        for ($i = 0; $i < $n; ++$i) {
            $ans ^= $nums[$i];
        }
        return $ans;
    }


}

$nums     = [2, 2, 1];
$solution = new Solution();
$info = $solution->singleNumberOne($nums);
print_r($info);
