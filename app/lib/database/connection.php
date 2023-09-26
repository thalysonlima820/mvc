<?php
phpinfo();
namespace Thaly\mvc\app\lib\database;

    abstract class connection
    {
        private static $conn;

        public static function GetConn()
        {
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            } catch (PDOException $e) {
                die('Erro de conexão: ' . $e->getMessage());
            }
            
            
            return self::$conn;
        }
    }