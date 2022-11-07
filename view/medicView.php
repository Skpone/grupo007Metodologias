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

    function showMedics($medics){

        $this->smarty->assign('medics', $medics);
        $this->smarty->assign('title', 'Medicos');
        $this->smarty->display('templates/medics.tpl');
    }

    
}