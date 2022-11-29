<?php

class AuthHelper
{
    function __construct()
    {
        // abre la sessión siempre para usar el helper
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($user)
    {
        $_SESSION['USER_ID'] = $user[0]->nro_medico;
        $_SESSION['USER_NAME'] = $user[0]->nombre_usuario;
    }

    public function checkLogedIn(){
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL);
            die();
        }
    }


    function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL . "login");
    }
}
