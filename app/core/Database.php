<?php

namespace App\Core;

use App\Config\Config;

class Database
{

    private static \PDO $connection;

    public static function getConnection(): \PDO
    {
        if(empty(self::$connection)){
            self::createConnect();
        }

        return self::$connection;
    }
    private static function createConnect(): void
    {
        $dbConfig = Config::database();
        self::$connection = new \PDO("mysql:host=" . $dbConfig['db_host']. ";dbname=" . $dbConfig['db_name'] . ";charset=utf8", $dbConfig['db_user'], $dbConfig['db_password']);

        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
}
