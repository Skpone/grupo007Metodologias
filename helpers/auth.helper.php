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
        $_SESSION['USER_ID'] = $user->nro_medico;
        $_SESSION['USER_NAME'] = $user->nombre_usuario;
    }

    public function obtainUser()
    {
        $user;
        $user->nro_medico = $_SESSION['USER_ID'];
        $user->nombre_usuario =$_SESSION['USER_NAME']; 
        return $user;
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
