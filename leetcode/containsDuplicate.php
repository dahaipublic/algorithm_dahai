<?php
class Solution {

    /**
     * 存在重复元素
     * 给你一个整数数组 nums 。如果任一值在数组中出现 至少两次 ，返回 true ；如果数组中每个元素互不相同，返回 false 。
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $a = 0;
        $map = [];
        // foreach((function($nums) {yield from $nums;})($nums) as $v){
        //     if(isset($map[$v])) {
        //         return true;
        //     }
        //     $map[$v] = $a;
        // }
        for ($i = 0; $i < count($nums); $i++) {
            if ($map[$nums[$i]]) {
                return true;
            }
            $map[$nums[$i]] = true;
        }
        return false;
    }
}