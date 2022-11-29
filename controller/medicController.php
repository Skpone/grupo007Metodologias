<?php

require_once 'model/medicModel.php';
require_once 'model/secretaryModel.php';
require_once 'view/medicView.php';
require_once './helpers/auth.helper.php';

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
        $this->authHelper = new AuthHelper();
    }

    function showMain() {
        $this-> view -> showMain();
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

    function displayMedics() {
        $medics = $this->model->getMedicos();
            $this->view->showMedics($medics);

    }

    function addMedic() {

        if (!empty($_POST['nombre_usuario']) && !empty($_POST['contrasenia']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['obra-social']) && !empty($_POST['especialidad'])) {
            $nombre_usuario = $_POST['nombre_usuario'];
            $contrasenia = password_hash($_POST['contrasenia'], PASSWORD_BCRYPT);
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $obra_social = $_POST['obra-social'];
            $especialidad = $_POST['especialidad'];
            $nro_secretaria = $_POST['nro_secretaria'];
            
            //se le pregunta a la BD si hay un medico con ese nombre de usuario (si no retorna nada es que no hay)
            $user = $this->model->getMedicByUsername($nombre_usuario);

            if (empty($user)) {
                if ($nro_secretaria = NULL) {
                    $this->model->insertMedic($nombre_usuario, $contrasenia, $nombre, $apellido, $obra_social, $especialidad, $nro_secretaria = null);
                    header("Location: " . BASE_URL . "medicos");
                } else {
                    $this->model->insertMedic($nombre_usuario, $contrasenia, $nombre, $apellido, $obra_social, $especialidad, $nro_secretaria);
                    header("Location: " . BASE_URL . "medicos");
                }

            } else {
                header("Location: " . BASE_URL . "nuevoMedico");
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

    function showMedicAgenda($nombre_usuario){
        if ($nombre_usuario != null){
            $medicId = $this->model->getMedicIdByUsername($nombre_usuario);
            $agenda = $this->model->getMedicAgenda($medicId);
            if ($agenda != null){
                $this->view->listMedicAgenda($agenda);
            } else {
                $this->view->listMedicAgenda($agenda = null);
            }
        } else {
            header("Location: " . BASE_URL . "login");
        }
    
    }

    public function displayLogin()
    {
        $this->view->showLogin();
    }

    public function loginMedico(){
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userMedico = $this->model->getUserMedico($username);

            if ($userMedico && password_verify($password, $userMedico->contrasenia)) {
                $this->authHelper->login($userMedico);
                header("Location: " . BASE_URL. "home-medico" . "/" . $userMedico->nro_medico);
            } else {
                $this->view->showLogin('ERROR DE USUARIO O CONTRASEñA');
            }
        }
    }

    public function displayHomeMedico($idMedico)
    {
        if (isset($idMedico)) {
           $dataMedico = $this->model->getMedicById($idMedico);
           $this->view->homeMedico($dataMedico);
        }
        else {
            header("Location: " . BASE_URL . "login");
        }
    }
    public function displayDetallesMedico($idMedico)
    {
        if (isset($idMedico)) {
            $dataMedico = $this->model->getMedicById($idMedico);
            $this->view->detallesMedico($dataMedico);
         }
         else {
             header("Location: " . BASE_URL . "login");
         }
    }

    function logout()
    {
        session_destroy();
        $this->authHelper->logout();
    }

    public function filterByDate($id) {
        $fechaDesde = date("Y-m-d H:i:s",strtotime($_POST['fecha-desde']));
        $fechaHasta = date("Y-m-d H:i:s",strtotime($_POST['fecha-hasta']));
        $parteDia = $_POST['parte-del-dia'];        

        if (!empty($id)) {
            if (!empty($fechaDesde) && !empty($fechaHasta) && $parteDia == 'todos') {
                $agenda = $this->model->getMedicAgendaAll($id, $fechaDesde, $fechaHasta);
                $this->view->listMedicAgenda($agenda);

            } else if ($parteDia == 'manana') {
                $agenda = $this->model->getMedicAgendaMorning($id, $fechaDesde, $fechaHasta);
                $this->view->listMedicAgenda($agenda);

            } else if ($parteDia == 'tarde') {
                $agenda = $this->model->getMedicAgendaAfternoon($id, $fechaDesde, $fechaHasta);
                $this->view->listMedicAgenda($agenda);
            }

        }

    }

}

