<?php

/**
 * 注册模式：
 * 将对象注册到全局树上，就可以被任意地方访问了
 *
 * 特点：
 * 1：定义一个私有化静态变量存储对象数据
 * 2：实现一个注册函数方法
 * 3：实现一个获取对象函数方法
 * 4：删除一个对象数据
 *
 * 场景：
 * 通常与工厂模式一块使用，也可以单独封装一种功能使用
 */

class Register
{
    private static $object;

    public static function set($key, $value)
    {
        self::$object[$key] = $value; //将对象放到树上
    }

    public static function get($key)
    {
        return self::$object[$key];
    }

    public static function _unset($key)
    {
        unset(self::$object[$key]);
    }

}

Register::set('conf', ['dbhost' => '127.0.0.1']);
var_dump(Register::get('conf'));



