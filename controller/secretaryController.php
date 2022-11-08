<?php

require_once 'model/secretaryModel.php';
require_once 'model/medicModel.php';

require_once 'view/secretaryView.php';

class SecretaryController
{
    private $view;
    private $model;
    private $modelM;

    public function __construct()
    {
        $this->model = new SecretaryModel();
        $this->modelM = new MedicModel();
        $this->view = new SecretaryView();
    }

    function eraseSecretary($id)
    {
        $this->model->deleteSecretary($id);
        header("Location: " . BASE_URL . "secretarias");
    }
    
    function displaySecretariesList(){
        $secretaries = $this->model->getSecretarias();
        $medics = $this->modelM->getMedicos();
        $this->view->showSecretaries($secretaries, $medics);
    }

    function showNewSecretaryForm() {
         $dataSecretarias = $this->model->getSecretarias();
         $this->view->showAddSecretary($dataSecretarias);

    }

    function addSecretary(){
        if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $this->model->insertSecretary($nombre, $apellido);

            header("Location: " . BASE_URL . "secretarias");
        } else {

            header("Location: " . BASE_URL . "agregarSecretaria");
        }   
    }
}
