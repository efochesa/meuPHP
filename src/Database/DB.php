<?php
namespace MeuPHP\Database;

use PDO;

class DB {
    protected static ?PDO $pdo = null;

    protected static function connect() {
        if (!self::$pdo) {
            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']};port={$_ENV['DB_PORT']}";
            self::$pdo = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function all($query) {
        self::connect();
        $stmt = self::$pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
