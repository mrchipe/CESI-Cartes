<?php

class App
{
    private static $db;

    public static function getDatabase()
    {
        if (!self::$db) {
            $host = self::config('db_host');
            $port = self::config('db_port');
            $username = self::config('db_username');
            $password = self::config('db_password');
            $dbname = self::config('db_database');

            self::$db = new Database($username, $password, $dbname, $host, $port);
        }

        return self::$db;
    }

    public static function config(string $configName): ?string
    {
        if (file_exists('.env')) {
            $config = parse_ini_file('.env');

            if (in_array(strtoupper($configName), array_keys($config))) {
                return empty(trim($config[strtoupper($configName)])) ? null : trim($config[strtoupper($configName)]);
            }
        }

        return null;
    }

    public static function redirect($page)
    {
        header('Location: ' . $page);
        exit();
    }

    public static function view($page)
    {
        include_once './includes/header.inc.php';

        if (Session::getInstance()->hasFlashes()) {
            include_once './includes/error.php';
        }

        include_once './includes/' . $page . '.inc.php';
        include_once './includes/footer.inc.php';

        exit();
    }
}
