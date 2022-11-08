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

    function showAddSecretary($dataSecretarias) {
        
    }
    
}