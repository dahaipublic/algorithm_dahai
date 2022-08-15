<?php

/**
 * 单例实现数据库连接
 */

class SingletonMysql
{
    private static $instance = null;
    private static $db       = null;
    const DB_TYPE = 'mysql';
    const DB_HOST = '127.0.0.1';
    const DB_NAME = 'test';
    const DB_USER = 'root';
    const DB_PASS = '123456';
    const DB_MS   = self::DB_TYPE . ':host=' . self::DB_HOST . ';' . 'dbname=' . self::DB_NAME;

    // 数据库连接
    private function __construct()
    {
        try {
            self::$db = new PDO(self::DB_MS, self::DB_USER, self::DB_PASS);
            self::$db->query('set names utf8mb4');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('error:' . $e->getMessage());
        }
    }

    // 禁止clone
    private function __clone()
    {

    }

    public static function getInstance(): object
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query(string $sql = ''): array
    {
        return self::$db->query($sql)->fetch();
    }

}

$mysql = SingletonMysql::getInstance();

var_dump($mysql->query('SELECT VERSION();'));
