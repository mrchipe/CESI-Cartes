<?php

session_start();
include_once './functions.php';

if (!isset($_SESSION['game'])) {
    return header('Location: /');
}

// Début de la partie
die(var_dump($_SESSION['game']));
