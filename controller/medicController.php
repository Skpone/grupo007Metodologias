<?php

require_once 'model/medicModel.php';
require_once 'model/secretaryModel.php';
require_once 'view/medicView.php';

class MedicController
{
    private $view;
    private $model;
    private $modelS;

    public function __construct()
    {
        $this->model = new MedicModel();
        $this->modelS = new SecretaryModel();
        $this->view = new MedicView();
    }


    function showFirstPage()
    {
        $this->view->showPage();
    }

    function showNewMedicForm() {
        $dataSecretarias = $this->modelS->getSecretarias();
        $this->view->showAddMedic($dataSecretarias);
    }

    function displayMedicsList($idSecretaria = null)
    {
        if (isset($idSecretaria)) {
            $medics = $this->model->getMedicos();
            $this->view->showMedics($medics, $idSecretaria);
        } else {
            $medics = $this->model->getMedicos();
            $this->view->showMedics($medics);
        }
    }

    function addMedic()
        {

            if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['obra-social']) && !empty($_POST['especialidad'])) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $obra_social = $_POST['obra-social'];
                $especialidad = $_POST['especialidad'];
                $nro_secretaria = $_POST['nro_secretaria'];

                if ($nro_secretaria = NULL) {
                    $this->model->insertMedic($nombre, $apellido, $obra_social, $especialidad, $nro_secretaria = null);
                    header("Location: " . BASE_URL . "medicos");
                } else {
                    $this->model->insertMedic($nombre, $apellido, $obra_social, $especialidad, $nro_secretaria);
                    header("Location: " . BASE_URL . "medicos");
                }
            } else {
                
                header("Location: " . BASE_URL . "nuevoMedico");
            }
        }

        function eraseMedic($id)
        {
            $this->model->deleteMedic($id);
            header("Location: " . BASE_URL . "medicos");
        }

        function asignarSecretaria($idSecretaria, $idMedico)
        {
            if (isset($idSecretaria) && isset($idMedico)) {
                $this->model->asignSecretarie($idSecretaria, $idMedico);
            }

            header("Location: " . BASE_URL . "secretarias");
        }
    }

