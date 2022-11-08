<?php

require_once 'libs/smarty-4.1.1/libs/Smarty.class.php';

class MedicView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showPage() {
        $this->smarty->display('templates/firstPage.tpl');
    } 

    function showMedics($medics,$idSecretaria=null){
        if(isset($idSecretaria)){
            $this->smarty->assign('idSecretaria', $idSecretaria);
        }

        $this->smarty->assign('medics', $medics);
        $this->smarty->assign('title', 'Medicos');
        $this->smarty->display('templates/medics.tpl');
    }

    function showAddMedic($dataSecretarias) {
        $this->smarty->assign('secretarias', $dataSecretarias);
        $this->smarty->display('templates/newMedic.tpl');

    }

    
}