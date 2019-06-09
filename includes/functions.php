<?php

function config(string $configName): ?string
{
    if (file_exists('.env')) {
        $config = parse_ini_file('.env');

        if (in_array(strtoupper($configName), array_keys($config))) {
            return empty(trim($config[strtoupper($configName)])) ? null : trim($config[strtoupper($configName)]);
        }
    }

    return null;
}

function redirect(string $page): void
{
    header('Location: ' . $page);
    exit();
}

function view(string $view, array $params = []): void
{
    if (!empty($params)) {
        Session::getInstance();
        $_SESSION['params'] = $params;
    }

    include_once './includes/header.inc.php';

    if (Session::getInstance()->hasFlashes()) {
        include_once './includes/error.php';
    }

    include_once './view/' . $view;
    include_once './includes/footer.inc.php';

    exit();
}

/**
 * @param string|null $var
 * @return bool|float|int|string|null
 */
function params(string $var = null)
{
    Session::getInstance();

    if (!is_null($var)) {
        return isset($_SESSION['params'][$var]) ? $_SESSION['params'][$var] : null;
    }

    if (isset($_SESSION['params'])) {
        return $_SESSION['params'];
    }

    return null;
}

function all(): array
{
    $values = [];

    foreach ($_REQUEST as $var => $value) {
        $values[$var] = get($var);
    }

    return $values;
}

/**
 * @param string $var
 * @return bool|float|int|string|null
 */
function get(string $var)
{
    if (isset($_REQUEST[$var])) {
        $variable = trim($_REQUEST[$var]);

        if (is_null($variable) || mb_strlen($variable) <= 0) {
            return null;
        }

        if (filter_var($variable, FILTER_VALIDATE_INT)) {
            return intval($variable);
        }

        if (filter_var($variable, FILTER_VALIDATE_FLOAT)) {
            return floatval($variable);
        }

        if (filter_var($variable, FILTER_VALIDATE_BOOLEAN)) {
            return boolval($variable);
        }

        if ($variable === 'true' || $variable === 'false') {
            return $variable === 'true' ? true : false;
        }

        if (is_numeric($variable)) {
            return intval($variable);
        }

        return $variable;
    }

    return null;
}
