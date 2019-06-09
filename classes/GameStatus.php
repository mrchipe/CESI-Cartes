<?php

class GameStatus
{
    const START = 10;
    const GAME = 20;
    const END = 30;

    public static function setStatus(int $status): void
    {
        Session::getInstance();
        $_SESSION['game_status'] = $status;
    }

    public static function getStatus(): int
    {
        Session::getInstance();

        if (!isset($_SESSION['game_status'])) {
            $_SESSION['game_status'] = self::START;
        }

        return $_SESSION['game_status'];
    }
}
