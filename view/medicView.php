<?php

require_once 'libs/smarty-4.1.1/libs/Smarty.class.php';

class MedicView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showMain() {
        $this-> smarty -> display ('templates/main.tpl');
    }

    public function showPage() {
        $this->smarty->assign('title', 'Home');
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

    function listMedicAgenda($agenda){
        $this->smarty->assign('agenda', $agenda);
        $this->smarty->assign('title', 'Lista Turnos Venideros');
        $this->smarty->display('templates/medicAgenda.tpl');
    }

    public function showLogin()
    {
        $this->smarty->assign('title', 'Login');
        $this->smarty->display('templates/login.tpl');
    }

    public function homeMedico($dataMedico)
    {
        $this->smarty->assign('title', 'Home');
        $this->smarty->assign('dataMedico', $dataMedico);
        $this->smarty->display('templates/homeMedico.tpl');
    }

    public function detallesMedico($dataMedico)
    {
        $this->smarty->assign('title', 'Home');
        $this->smarty->assign('dataMedico', $dataMedico);
        $this->smarty->display('templates/detallesMedico.tpl');
    }
    
}