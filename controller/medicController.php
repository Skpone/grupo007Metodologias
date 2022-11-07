<?php

require_once 'model/medicModel.php';
require_once 'view/medicView.php';

class MedicController {
    private $view;
    private $model;

    public function __construct() {
        $this->model = new MedicModel();
        $this->view = new MedicView();
    }


    function showFirstPage() {
        $this-> view -> showPage();
    }

    function displayMedicsList(){
        $medics = $this->model->getMedicos();
        $this->view->showMedics($medics);
    }

    function addMedic() {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $obra_social = $_POST['obra-social'];
        $especialidad = $_POST['especialidad'];
        $nro_secretaria = $_POST['nro_secretaria'];

        $this->model->insertMedic($nombre, $apellido, $obra_social, $especialidad, $nro_secretaria);
    }

    function eraseMedic($id) {
        $this->model->deleteMedic($id);
        header("Location: " . BASE_URL . "medicos");
    }
}