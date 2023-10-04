<?php
namespace app\lib\database;

use PDO;
use PDOException;

class Connection
{
    private static $conn;
    
    public static function getConnection()
    {
        if (self::$conn === null) {
            try {
                // Substitua esses valores pelas suas configurações reais
                $host = 'localhost';
                $dbname = 'test';
                $username = 'root';
                $password = '';
                
                self::$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new \Exception('Erro de conexão: ' . $e->getMessage());
            }
        }
        
        return self::$conn;
    }
}
