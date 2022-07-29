<?php
/**
 * . 无重复字符的最长子串
 * 给定一个字符串 s ，请你找出其中不含有重复字符的 最长子串 的长度。
 * 示例 1:
 * 输入: s = "abcabcbb"
 * 输出: 3
 * 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
 * 示例 2:
 *
 * 输入: s = "bbbbb"
 * 输出: 1
 * 解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
 * 示例 3:
 *
 * 输入: s = "pwwkew"
 * 输出: 3
 * 解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
 * 请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
 **/

class Solution
{

    /**
     * @param String $s
     *
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {

        $l = strlen($s); //获取字符串总长度
        $len = 0;   //记录长度
        $find = ''; //保存截取字符串

        for ($i = 0; $i < $l; $i++) {
            $res = strpos($find, $s[$i]); // 查找$find中是否存在

            if ($res !== false) {

                $find .= $s[$i];

                $find = substr($find, $res + 1);

            } else {
                $find .= $s[$i];
            }

            $len = strlen($find) > $len ? strlen($find) : $len;
        }
        return $len;
    }
}

$str = "abcabcbb";
$s = (new Solution())->lengthOfLongestSubstring($str);
var_dump($s);
die();