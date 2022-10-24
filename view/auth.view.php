<?php

require_once './libs/smarty/libs/Smarty.class.php';

class AuthView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    public function showFormLogin($error = null, $genres = null){ //asi le aclaro que el parametro es opcional
        $this->smarty->assign('title', 'Login');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/formLogin.tpl');
    }

    public function showFormRegister($error = null, $genres = null){
        $this->smarty->assign('title', 'Registro');
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/formRegister.tpl');    
    }
}