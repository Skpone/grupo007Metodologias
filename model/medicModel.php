<?php

class MedicModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe;charset=utf8', 'root', '');
    }


    function insertMedic($nombre, $apellido, $obra_social = null, $especialidad = null, $nro_secretaria = null) {
        $query = $this->db->prepare('INSERT INTO medico (nro_medico, nombre, apellido, obra_social, especialidad, nro_secretaria) 
                                     VALUES (NULL, ?, ?, ?, ?, ?)');

        $query->execute([$nombre, $apellido, $obra_social, $especialidad, $nro_secretaria]);
    }

    function deleteMedic($id) {
        $query = $this->db->prepare('DELETE FROM medico WHERE nro_medico = ?');

        $query->execute([$id]);
    }
}

