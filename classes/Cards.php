<?php

class Cards
{
    /**
     * [
     *      1 => [
     *          'cards' => [
     *              // toutes les cartes qu'a le joueur
     *          ],
     *          'pseudo' => 'Mon pseudo'
     *      ]
     * ]
     *
     * @var array $players : Liste des joueurs avec leurs infos
     */
    private $players = [];
    private $cards = [];

    private $figures = ['carreaux', 'treffles', 'piques', 'coeurs'];

    private $min;
    private $max;

    /**
     * Cette fonction est appelé quand on construit l'objet Cards (ex: new Cards())
     * @param int $size : Si la valeur est strictement égale a 32, la valeur de $this->min = 2, sinon $this->min = 7
     */
    public function __construct(int $size = 52)
    {
        $this->min = $size === 32 ? 7 : 2;
        $this->max = 14;

        $this->cards = $this->cardsGenerator();
    }

    /**
     * Retourne un tableau avec les cartes générée et les mélange en même temps
     * @return array
     */
    private function cardsGenerator(): array
    {
        $cards = [];

        for ($i = $this->min; $i <= $this->max; $i++) {
            foreach ($this->figures as $figure) {
                $cards[] = [
                    'value' => $i,
                    'figure' => $figure
                ];
            }
        }

        shuffle($cards);

        return $cards;
    }

    /**
     * Retourne la variable $this->cards, qui est l'ensemble des cartes
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }
}
