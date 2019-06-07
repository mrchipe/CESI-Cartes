<?php

class Game
{
    /** @var Cards */
    private $cards;

    /** @var Players */
    private $players;

    private $computer;
    private $tour = 0;

    public function __construct()
    {
        $session = Session::getInstance();

        if (isset($_SESSION['game'])) {
            if ($_SESSION['game'] instanceof Game) {
                die('yes');
            } else {
                $this->initGame($_SESSION['game']['cartNumber'], $_SESSION['game']['players'], $_SESSION['game']['playerPc']);
            }
        } else {
            $session->setFlash('danger', 'Une erreur est survenu lors de la création de la partie.');
            App::redirect('index.php');
        }
    }

    public function initGame(int $numberCards, array $players, bool $computer = false)
    {
        $this->cards = new Cards($numberCards);
        $this->players = new Players();
        $this->computer = $computer;

        $this->initPlayers($numberCards, $players);
    }

    private function initPlayers(int $numberCards, array $players): void
    {
        $cardByPlayer = floor($numberCards / count($players));
        $cards = array_chunk($this->cards->getCards(), $cardByPlayer);

        foreach ($players as $key => $pseudo) {
            $this->players->addPlayers([
                'pseudo' => $pseudo,
                'cards' => $cards[$key]
            ]);
        }
    }

    private function next()
    {
        //
    }
}
