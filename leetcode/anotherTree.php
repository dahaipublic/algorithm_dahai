<?php

/**
 * 另一棵树的子树
 * 给你两棵二叉树 root 和 subRoot 。检验 root 中是否包含和 subRoot 具有相同结构和节点值的子树。如果存在，返回 true ；否则，返回 false 。
 * 二叉树 tree 的一棵子树包括 tree 的某个节点和这个节点的所有后代节点。tree 也可以看做它自身的一棵子树。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/subtree-of-another-tree
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 * 输入：root = [3,4,5,1,2], subRoot = [4,1,2]
 * 输出：true
 * 输入：root = [3,4,5,1,2,null,null,null,null,0], subRoot = [4,1,2]
 * 输出：false
 *
 * 提示：
 * root 树上的节点数量范围是 [1, 2000]
 * subRoot 树上的节点数量范围是 [1, 1000]
 * -104 <= root.val <= 104
 * -104 <= subRoot.val <= 104
 *
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $s
     * @param TreeNode $t
     *
     * @return Boolean
     */
    function isSubtree($s, $t)
    {
        if (is_null($s)) return false;
        if ($s == $t) if ($this->isDiff($s, $t)) return true;

        $left  = $this->isSubtree($s->left, $t);
        $right = $this->isSubtree($s->right, $t);

        return $left || $right;
    }

    public function isDiff($s, $t)
    {
        if (is_null($s) && is_null($t)) return true;
        if ($s != $t) return false;
        $left  = $this->isDiff($s->left, $t->left);
        $right = $this->isDiff($s->right, $t->right);

        return $left && $right;
    }
}