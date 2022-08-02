<?php

/*
 * 两数之和
 * 输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 * 输出：7 -> 0 -> 8
 * 原因：342 + 465 = 807
 * 定义一个单链表
 * @param $val int
 * @param $next ptr
 * Definition for a singly-linked list.
 * 参考 https://learnku.com/articles/44512
 **/

class ListNode
{
    public $val  = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        // 先初始化一个新节点
        $newList = new ListNode(0);
        // 赋值给用于计算后组成的链表的当前节点
        $com = $newList;
        // 定义一个变量储存 L1 L2对应链上的节点值相加时 需要进位的值，初始为 0
        $result = 0;
        // 循环检查两个链表的是否结束
        while ($l1 != null || $l2 != null) {
            // 当链表不存在值时 为 0
            $l1val = $l1 != null ? $l1->val : 0;
            $l2val = $l2 != null ? $l2->val : 0;

            // 相加得到新的值，需要加 上一个相加进位的值 然后大于 10 需要进位，并且取出大于 10 的部分
            // 取模得到大于 10 的部分
            $sum    = $l1val + $l2val + $result;
            $newVal = $sum % 10;
            // 计算需要进位的值 取整除10 的部分
            $result = intval($sum / 10);

            // 新建一个节点
            $newNode = new ListNode($newVal);
            // 向链表中添加 指向新增的节点
            $com->next = $newNode;
            // 更新链表，让链表的当前节点是 刚刚新增的节点
            $com = $com->next;
            // 判断并更新 L1链表 和 L2 链表的操作节点
            if ($l1 != null) {
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }
        // 最后还有一个注意点，当进位不等于 0 的时候 还需要向链表中增加一个节点
        if ($result > 0) {
            $com->next = new ListNode($result);
        }
        // 返回
        return $newList->next;

    }

    function addTwoNumbersOne($l1, $l2)
    {
        $obj = null;

        $additional = 0;
        do {
            $value = $l1->val + $l2->val + $additional;
            if ($value < 10) {
                $additional = 0;
            } else {
                $value      -= 10;
                $additional = 1;
            }

            $tmp_obj = new ListNode($value);

            if (is_null($obj)) {
                $obj = $tmp_obj;
            } else {
                $next->next = $tmp_obj;
            }
            $next = $tmp_obj;

            $l1 = $l1->next;
            $l2 = $l2->next;

        } while ($l1 || $l2 || $additional);

        return $obj;
    }
}

$solution      = new Solution();
$l1            = [2, 4, 3];
$l2            = [5, 6, 4];
$addTwoNumbers = $solution->addTwoNumbers($l1, $l2);
$addTwoNumbersOne = $solution->addTwoNumbersOne($l1, $l2);
var_dump($addTwoNumbers,$addTwoNumbersOne);