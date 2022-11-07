<?php

require_once './controller/auth.controller.php';
require_once './controller/medicController.php';
require_once './controller/secretaryController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'admin';
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'admin':
        $medicController = new medicController();
        $medicController->showFirstPage();
        break;
    default:
    echo '404 - Página no encontrada';
    break;
    }

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'eliminarSecretaria':
        $secretaryController = new SecretaryController();
        $secretaryController->eraseSecretary($params[1]);
        break;
    case 'secretarias':
        $secretaryController = new SecretaryController();
        $secretaryController->displaySecretariesList();
        break;
}
