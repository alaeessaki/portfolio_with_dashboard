<?php
class Database
{

    private static $hostName = "localhost";
    private static $dbName = "portfolio";
    private static $dbUserName = "root";
    private static $dbPassword = "";
    private static $connection = Null;

    public static function connect()
    {

        if (self::$connection == Null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$hostName . ";dbname=" . self::$dbName . ";charset=UTF8", self::$dbUserName, self::$dbPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = Null;
    }
}
