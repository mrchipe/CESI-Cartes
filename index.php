<?php

include_once './includes/bootstrap.php';
$session = Session::getInstance();

if (isset($_POST['choose_number_player'])) {
    $numberPlayer = isset($_POST['number_player']) ? $_POST['number_player'] : null;

    if (intval($numberPlayer) && $numberPlayer <= 4) {
        App::view('pseudo_form');
    }

    $session->setFlash('danger', 'Le nombre de joueurs n\'est pas valide.');
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

    App::redirect('game.php');
}

App::view('start_form');
