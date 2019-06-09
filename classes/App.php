<?php

class App
{
    private static $db;

    public static function getDatabase()
    {
        if (!self::$db) {
            $host = config('db_host');
            $port = config('db_port');
            $username = config('db_username');
            $password = config('db_password');
            $dbname = config('db_database');

            self::$db = new Database($username, $password, $dbname, $host, $port);
        }

        return self::$db;
    }
}
