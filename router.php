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

$medicController = new MedicController();
$secretaryController = new SecretaryController();
$authController = new AuthController();


switch ($params[0]) {
    case 'admin':
        $medicController->showFirstPage();
        break;
    case 'nuevoMedico':
        $medicController->showNewMedicForm();
        break;
    case 'nuevaSecretaria':
        $secretaryController->showNewSecretaryForm();
        break;
    case 'agregarSecretaria':
        $secretaryController->addSecretary();
        break;
    case 'agregarMedico':
        $medicController->addMedic();
        break;
    case 'eliminarSecretaria':
        $secretaryController->eraseSecretary($params[1]);
        break;
    case 'eliminarMedico':
        $medicController->eraseMedic($params[1]);
        break;
    case 'secretarias':
        $secretaryController->displaySecretariesList();
        break;
    case 'secretaria':
        $secretaryController->displaySecretariaParticular($params[1]);
        break;
    case 'elegirMedico':
        $medicController->displayMedicsList($params[1]);
        break;
    case 'asignarMedico':
        $medicController->asignarSecretaria($params[1], $params[2]);
        break;
    case 'agendaMedico':
        $medicController->showMedicAgenda($nombre_usuario);
        break;
    case 'medicAgenda':
        $medicController->displayMedicsList();
        break;
    case 'login':
        $medicController->displayLogin();
        break;
    case 'logout':
        $medicController->logout();
        break;
    case 'home-medico':
        $medicController->displayHomeMedico($params[1]);
        break;
    case 'detallesCuenta':
        $medicController->displayDetallesMedico($params[1]);
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}
