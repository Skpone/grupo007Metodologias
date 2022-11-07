<?php

require_once './controllers/auth.controller.php';
require_once './controllers/medicController.php';
require_once './controllers/secretaryController.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'verify':
        $secretaryController = new SecretaryController();
        $secretaryController->eraseSecretary($params[1]);
        break;
}
