<?php

namespace App\Config;

class Config
{
    public static function database(){
        return [
            "db_host" => $_ENV['DB_HOST'],
            "db_name" => $_ENV['DB_NAME'],
            "db_user" => $_ENV['DB_USER'],
            "db_password" => $_ENV['DB_PASSWORD']
        ];
    }

    private function __construct() {}
    private function __destruct() {}
}
