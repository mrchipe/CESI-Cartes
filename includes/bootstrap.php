<?php

function autoloader ($class_name) {
    include_once './classes/' . $class_name . '.php';
}

spl_autoload_register('autoloader');
