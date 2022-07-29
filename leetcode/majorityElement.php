<?php

/***
 * 多数元素
 * 给定一个大小为 n 的数组nums ，返回其中的多数元素。多数元素是指在数组中出现次数 大于⌊ n/2 ⌋的元素。
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 *
 * 示例1：
 * 输入：nums = [3,2,3]
 * 输出：3
 * 示例2：
 *
 * 输入：nums = [2,2,1,1,1,2,2]
 * 输出：2
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function majorityElement($nums)
    {
        $res = [];
        foreach ($nums as $v) {
            var_dump(end($res));
            if (end($res) == $v || empty($res)) {
                $res[] = $v;
                continue;
            }
            array_pop($res);
        }
        return end($res);
    }

    function majorityElementOne($nums)
    {
        $hash = [];

        for ($i = 0, $count = count($nums), $num = $count / 2; $i < $count; $i++) {
            $hash[$nums[$i]] = ($hash[$nums[$i]] ?? 0) + 1;
            if ($hash[$nums[$i]] > $num) {
                return $nums[$i];
            }
        }
    }

    /**
     * @param $nums
     *
     * @return false|int|string
     *                         统计每个元素出现的次数，找出出现次数最多的
     */
    function majorityElementTwo($nums)
    {
        // 内置函数
        $count = array_count_values($nums);
        return array_search(max($count), $count);
    }

    /**
     *使用一个辅助栈 栈为空则入栈，栈不为空，如果与栈顶元素不相同则出栈，最后栈顶元素就是要找的
     */

    function majorityElementThree($nums)
    {
        // Stack 开心消消乐
        $stack = [];
        foreach ($nums as $num) {
            if (empty($stack) || end($stack) == $num) {
                $stack[] = $num;
            } else {
                array_pop($stack);
            }
        }

        return end($stack);
    }
}

$nums     = [2, 2, 1, 1, 1, 2, 2];
$solution = new Solution();
$data     = $solution->majorityElement($nums);
print_r($data);
