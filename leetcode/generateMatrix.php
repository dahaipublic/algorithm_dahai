<?php
/**
 * 螺旋矩阵 II
 *
 * 给你一个正整数n ，生成一个包含 1 到n2所有元素，且元素按顺时针顺序螺旋排列的n x n 正方形矩阵 matrix 。
 *
 * 输入：n = 3
 * 输出：[[1,2,3],[8,9,4],[7,6,5]]
 * 示例 2：
 *
 * 输入：n = 1
 * 输出：[[1]]
 */

class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {
        $top = 0;
        $left = 0;
        $right = $n - 1;
        $bottom = $n - 1;
        $j = 1;
        $res =  array_fill(0,$n,array_fill(0,$n,0));
        while (true) {
            //从左上到右上
            for ($i = $left; $i <= $right; $i++) {
                $res[$top][$i] = $j;
                $j++;
            }
            $top++;
            if ($top > $bottom) break;

            //从右上到右下
            for($i = $top; $i <= $bottom; $i++){
                $res[$i][$right] = $j;
                $j++;
            }
            $right--;
            if($right < $left) break;

            //从右下到左下
            for($i = $right; $i >= $left; $i--){
                $res[$bottom][$i] = $j;
                $j++;
            }
            $bottom--;
            if($bottom < $top) break;

            //从左下到左上
            for($i = $bottom; $i >= $top; $i--){
                $res[$i][$left] = $j;
                $j++;
            }
            $left++;
            if($left > $right) break;
        }
        return $res;
    }
}
