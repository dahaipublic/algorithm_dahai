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
 * https://segmentfault.com/a/1190000020120285
 */
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $T = $this->malache($s);
        $n = strlen($T);
        $C = $R = 0;
        $p = [];
        for($i=1; $i<$n-1; $i++){
            $i_mirror = $C*2 - $i;
            if($R>$i){
                $p[$i] = min($R-$i,$p[$i_mirror]);
            }else{
                $p[$i] = 0;
            }
            while(($T[$i-1-$p[$i]]) == ($T[$i+1+$p[$i]]) ){
                $p[$i]++;
            }
            if($i + $p[$i] > $R) {
                $C = $i;
                $R = $i + $p[$i];
            }
        }
        $maxLen = 0;
        $centerIndex = 0;
        for ($i=1; $i<$n-1;$i++ ){
            if($p[$i] > $maxLen){
                $maxLen = $p[$i];
                $centerIndex = $i;
            }
        }

        $start = ($centerIndex-$maxLen)/2;
        echo substr($s,$start,$maxLen);
    }

    function malache($str){
        $n = strlen($str);
        if(!$str){
            return "^$";
        }
        $ret = '^';

        for($i=0; $i<$n; $i++){
            $ret .= '#'.$str[$i];
        }
        $ret .= "#$";

        return $ret;

    }
}
$str = "cbbd";
$s = (new Solution())->longestPalindrome($str);
var_dump($s);
die();