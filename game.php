<?php

include_once './includes/bootstrap.php';
$session = Session::getInstance();

if (!isset($_SESSION['game'])) {
    return header('Location: index.php');
}

// Début de la partie
die(var_dump($_SESSION['game']));
