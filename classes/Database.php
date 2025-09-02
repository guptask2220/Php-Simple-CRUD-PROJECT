<?php
namespace App\Database;
use PDO;
use PDOException;

class Database {
    private static $host = "localhost";
    private static $dbname = "test";
    private static $username = "root";
    private static $password = "";

    public static function getConnection() {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Table auto create if not exists
            $conn->exec("CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                age INT NOT NULL,
                gender VARCHAR(10) NOT NULL
            )");

            return $conn;
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }
}
