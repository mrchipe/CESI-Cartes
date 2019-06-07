<?php

class Session
{
    private static $instance;

    public static function getInstance(): Session
    {
        if (!self::$instance) {
            self::$instance = new Session();
        }

        return self::$instance;
    }

    public function __construct()
    {
        session_start();
    }

    public function setFlash(string $key, string $message): void
    {
        $_SESSION['flash'][$key] = $message;
    }

    public function hasFlashes(): bool
    {
        return isset($_SESSION['flash']);
    }

    public function getFlashes(): ?array
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);

        return $flash;
    }
}
