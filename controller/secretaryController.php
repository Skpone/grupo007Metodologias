<?php

require_once 'model/secretaryModel.php';
require_once 'view/secretaryView.php';

class SecretaryController
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->model = new SecretaryModel();
        $this->view = new SecretaryView();
    }

    function eraseSecretary($id)
    {
        $this->model->deleteSecretary($id);
    }
}
