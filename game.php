<?php

include_once './includes/bootstrap.php';
$session = Session::getInstance();

if (!isset($_SESSION['game'])) {
    App::redirect('index.php');
}

// $_SESSION['game']['cartNumber'], $_SESSION['game']['players'], $_SESSION['game']['playerPc']
$game = new Game($session);

die(var_dump($game));
