<?php

    abstract class connection
    {
        private static $conn;

        public static function GetConn()
        {
            if(self::$conn == null){
                self::$conn = new PDO('mysql: host=localhost; dbname=test;', 'root', '');
            }
            
            return self::$conn;
        }
    }