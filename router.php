<?php

require_once './controllers/auth.controller.php';
require_once './controllers/medicController.php';
require_once './controllers/secretaryController.php';

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

