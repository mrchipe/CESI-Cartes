<?php

session_start();
include_once './functions.php';

if (!isset($_SESSION['game'])) {
    return header('Location: index.php');
}

// Début de la partie
die(var_dump($_SESSION['game']));
