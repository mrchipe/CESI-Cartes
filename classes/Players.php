<?php

class Players
{
    private static $instance;

    public function __construct()
    {
        Session::getInstance();
    }

    public static function getInstance(): Players
    {
        if (!self::$instance) {
            self::$instance = new Players();
        }

        return self::$instance;
    }

    public function setPlayers(array $players): void
    {
        $_SESSION['game']['players'] = $players;
    }

    public function getPlayers(): array
    {
        return isset($_SESSION['game']['players']) ? $_SESSION['game']['players'] : [];
    }
}
