<?php

include_once './pdo.php';
include_once './bootstrap.php';

function view($viewName)
{
    include_once './includes/header.inc.php';
    include_once './includes/' . $viewName . '.inc.php';
    include_once './includes/footer.inc.php';

    die();
}
