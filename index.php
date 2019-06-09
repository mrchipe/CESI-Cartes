<?php

include_once './includes/bootstrap.php';

if (get('restart')) {
    Game::getInstance()->restartGame();
}

/*
 * Game start
 */
if (GameStatus::getStatus() === GameStatus::START) {
    // Step 1
    if (get('step') === 1 && get('number_player') && get('cart_number')) {
        view('start/step2.php', [
            'number_player' => get('number_player'),
            'cart_number' => get('cart_number')
        ]);
    }

    // Step 2
    if (get('step') === 2 && get('cart_number')) {
        $players = [];
        foreach (all() as $var => $value) {
            if (substr($var, 0, 14) === 'pseudo_player_') {
                $players[] = [
                    'pseudo' => $value ? $value : 'Joueur ' . substr($var, 14)
                ];
            }
        }

        $cartNumber = get('cart_number') ? get('cart_number') : Cards::DEFAULT_SIZE;

        Game::getInstance()->startGame($players, $cartNumber);
    }

    view('start/step1.php');
}

/*
 * Game
 */
if (GameStatus::getStatus() === GameStatus::GAME) {
    $nextTour = Game::getInstance()->nextTour();
    view('game/index.php', [
        'cards' => $nextTour['cards'],
        'winner' => $nextTour['winner'],
        'players' => Players::getInstance()->getPlayers()
    ]);
}

/*
 * Game end
 */
if (GameStatus::getStatus() === GameStatus::END) {
    die('end');
}
