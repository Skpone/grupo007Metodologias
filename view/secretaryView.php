<?php

require_once 'libs/smarty-4.1.1/libs/Smarty.class.php';

class SecretaryView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function showSecretaries($secretaries){
        $this->smarty->assign('secretaries', $secretaries);
        $this->smarty->assign('title', 'Secretarias');
        $this->smarty->display('templates/secretaries.tpl');

    }

    function showSecretaria($secretaria,$medicos){
        $this->smarty->assign('medicos', $medicos);
        $this->smarty->assign('title', 'Secretaria');
        $this->smarty->assign('secretaria',$secretaria);
        $this->smarty->display('templates/secretaria.tpl');
    }

    function showAddSecretary($dataSecretarias) {
        $this->smarty->assign('secretariesData', $dataSecretarias);
        $this->smarty->assign('title', 'Alta Secretaria');
        $this->smarty->display('templates/newSecretary.tpl'); 
    }
    
}