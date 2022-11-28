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

    function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL . "/login");
    }
}
