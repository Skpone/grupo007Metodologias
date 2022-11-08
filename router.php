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
        $medicController = new MedicController();
        $medicController->showFirstPage();

        break;
    case 'eliminarSecretaria':
        $secretaryController = new SecretaryController();
        $secretaryController->eraseSecretary($params[1]);
        break;
    case 'eliminarMedico':
        $secretaryController = new MedicController();
        $secretaryController->eraseMedic($params[1]);
        break;
    case 'secretarias':
        $secretaryController = new SecretaryController();
        $secretaryController->displaySecretariesList();
        break;
    case 'elegirMedico':
        $medicController = new MedicController();
        $medicController->displayMedicsList($params[1]);
        break;
    case 'asignarMedico':
        $medicController = new MedicController();
        $medicController->asignarSecretaria($params[1],$params[2]);
        break;
    case 'medicos':
        $medicController = new MedicController();
        $medicController->displayMedicsList();
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}
