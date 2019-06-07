<?php

session_start();
$_SESSION['flash'] = [];

include_once './functions.php';

if (isset($_POST['choose_number_player'])) {
    $numberPlayer = isset($_POST['number_player']) ? $_POST['number_player'] : null;

    if (intval($numberPlayer) && $numberPlayer <= 4) {
        view('pseudo_form');
    }

    $_SESSION['flash']['number_player'] = true;
}

if (isset($_POST['choose_pseudo_player'])) {
    $players = [];
    $playerPc = false;
    $cartNumber = isset($_POST['cartNumber']) ? intval($_POST['cartNumber']) : 52;

    $i = 1;
    foreach ($_POST as $item => $value) {
        if (substr($item, 0, 14) === "pseudo_player_") {
            $players[] = empty(trim($value)) ? 'Joueur ' . $i : trim($value);
            $i++;
        }
    }

    if ((isset($_POST['player_pc']) && $_POST['player_pc'] === 'on') || count($players) <= 1) {
        $playerPc = true;
    }

    $_SESSION['game'] = [
        'players' => $players,
        'playerPc' => $playerPc,
        'cartNumber' => $cartNumber
    ];

    return header('Location: /game.php');
}

view('start_form');
