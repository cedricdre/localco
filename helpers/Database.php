<?php
require_once __DIR__ . '/../config/init.php';

class Database {

    private static $pdo;
    
    public static function connect() {
        if (is_null(self::$pdo)) {
            self::$pdo = new PDO(DSN, USER, PASSWORD);
        }
        return self::$pdo;
    }
}