<?php

class Players
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

    public function addPlayers(array $player): void
    {
        $this->players[] = $player;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }
}
