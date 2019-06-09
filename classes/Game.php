<?php

class Game
{
    private static $instance;

    public function __construct()
    {
        Session::getInstance();
    }

    public static function getInstance(): Game
    {
        if (!self::$instance) {
            self::$instance = new Game();
        }

        return self::$instance;
    }

    public function startGame(array $players, int $cartNumber)
    {
        $cardsByPlayer = floor($cartNumber / count($players));
        $cards = array_chunk((new Cards($cartNumber))->getCards(), $cardsByPlayer);

        $_players = [];

        foreach ($players as $key => $player) {
            $_players[] = [
                'pseudo' => $player['pseudo'],
                'cards' => $cards[$key]
            ];
        }

        $_SESSION['game']['card_number'] = $cartNumber;

        Players::getInstance()->setPlayers($_players);
        GameStatus::setStatus(GameStatus::GAME);

        redirect('index.php');
    }

    public function nextTour(?array $onlyPlayer = null): array
    {
        $cards = [];
        $players = Players::getInstance()->getPlayers();

        foreach ($players as $index => $player) {
            if (!is_null($onlyPlayer)) {
                if (!in_array($index, $onlyPlayer)) {
                    continue;
                }
            }

            if (isset($player['lose']) && $player['lose'] == true) {
                continue;
            }

            if (empty($player['cards'])) {
                $player['lose'] = true;
            } else {
                $card = array_shift($player['cards']);
                $cards[$index] = $card;
            }

            $players[$index] = $player;
        }

        $currentMax = null;
        $winner = null;
        foreach ($cards as $index => $card) {
            if ($card['value'] >= $currentMax) {
                $currentMax = $card['value'];
                $winner = $index;
            }
        }

        $equals = [];
        foreach ($cards as $index => $card) {
            if ($index !== $winner && $currentMax == $card['value']) {
                $equals[] = $index;
            }
        }

        $players[$winner]['cards'] = array_merge($players[$winner]['cards'], $cards);

        Players::getInstance()->setPlayers($players);

        return [
            'winner' => $winner,
            'cards' => $cards,
            'equals' => $equals
        ];
    }

    public function restartGame()
    {
        if (isset($_SESSION['game'])) {
            unset($_SESSION['game']);
        }

        GameStatus::setStatus(GameStatus::START);

        redirect('index.php');
    }
}
