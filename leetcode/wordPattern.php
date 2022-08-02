<?php

/**
 * 单词规律
 * 给定一种规律 pattern和一个字符串s，判断 s是否遵循相同的规律。
 * 这里的遵循指完全匹配，例如，pattern里的每个字母和字符串s中的每个非空单词之间存在着双向连接的对应规律。
 * 示例1:
 *
 * 输入: pattern = "abba", s = "dog cat cat dog"
 * 输出: true
 * 示例 2:
 *
 * 输入:pattern = "abba", s = "dog cat cat fish"
 * 输出: false
 * 示例 3:
 *
 * 输入: pattern = "aaaa", s = "dog cat cat dog"
 * 输出: false
 *
 */
class Solution
{

    /**
     * @param String $pattern
     * @param String $s
     *
     * @return Boolean
     */
    function wordPattern($pattern, $s)
    {
        $data = explode(" ", $s);
        $map  = [];
        $keys = [];
        if (strlen($pattern) != count($data)) {
            return false;
        }
        for ($i = 0; $i < strlen($pattern); $i++) {
            if (isset($map[$pattern[$i]])) {
                if ($map[$pattern[$i]] != $data[$i]) {
                    return false;
                }
            } else {
                if (isset($keys[$data[$i]]) && $keys[$data[$i]] != $pattern[$i]) {
                    return false;
                }
                $keys[$data[$i]]   = $pattern[$i];
                $map[$pattern[$i]] = $data[$i];
            }
        }
        return true;
    }
}

$pattern  = "abba";
$s        = "dog cat cat dog";
$solution = (new Solution())->wordPattern($pattern, $s);
var_dump($solution);