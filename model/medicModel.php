<?php

class MedicModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe;charset=utf8', 'root', '');
    }

    function getMedicos($idSecretaria = null)
    {
        if (isset($idSecretaria)) {
            $query = $this->db->prepare('SELECT * FROM medico WHERE nro_secretaria = ?');
            $query->execute([$idSecretaria]);

            $medicos = $query->fetchAll(PDO::FETCH_OBJ);
            return $medicos;
        } else {


            $query = $this->db->prepare('SELECT * FROM medico');
            $query->execute();

            $medicos = $query->fetchAll(PDO::FETCH_OBJ);

            return $medicos;
        }
    }

    function getMedicByUsername($nombre_usuario) {
        $query = $this->db->prepare('SELECT * FROM medico WHERE nombre_usuario = ?');
        $query->execute([$nombre_usuario]);

        $medic = $query->fetch(PDO::FETCH_OBJ);

        return $medic;
    }

    function getMedicIdByUsername($nombre_usuario) {
        $query = $this->db->prepare('SELECT nro_medico FROM medico WHERE nombre_usuario = ?');
        $query->execute([$nombre_usuario]);

        $medicId = $query->fetch(PDO::FETCH_OBJ);

        return $medicId;
    }

    function insertMedic($nombre_usuario, $contrasenia, $nombre, $apellido, $obra_social = null, $especialidad = null, $nro_secretaria = null)
    {
        $query = $this->db->prepare('INSERT INTO medico (nro_medico, nombre, apellido, obra_social, especialidad, nro_secretaria, nombre_usuario, contrasenia) 
                                     VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)');

        $query->execute([$nombre, $apellido, $obra_social, $especialidad, $nro_secretaria, $nombre_usuario, $contrasenia]);
    }


    function deleteMedic($id)
    {
        $query = $this->db->prepare('DELETE FROM medico WHERE nro_medico = ?');

        $query->execute([$id]);
    }

    function asignSecretarie($idSecretaria, $idMedico)
    {
        $query = $this->db->prepare('UPDATE medico SET nro_secretaria= ? WHERE nro_medico = ?');

        $query->execute([$idSecretaria, $idMedico]);
    }

    function getMedicAgenda($id_medico) {
        $query = $this->db->prepare('SELECT * FROM turnos_venideros WHERE nro_medico = ?');
        $query->execute([$id_medico]);

        $medic = $query->fetch(PDO::FETCH_OBJ);

        return $medic;
    }

    function getMedicAgendaAll($id_medico,$fechaDesde, $fechaHasta)
    {
        $query = $this->db->prepare('SELECT * FROM turnos_venideros WHERE nro_medico = ? AND fecha_turno IS BETWEEN ? AND ?');
        $query->execute([$id_medico,$fechaDesde, $fechaHasta]);

        $agenda = $query->fetchAll(PDO::FETCH_OBJ);

        return $agenda;
    }

    function getMedicAgendaMorning($id_medico,$fechaDesde, $fechaHasta)
    {
        $query = $this->db->prepare('SELECT * FROM turnos_venideros WHERE nro_medico = ? AND fecha_turno IS BETWEEN ? AND ? AND EXTRACT(HOUR FROM fecha_turno) IS BETWEEN 6 AND 12');
        $query->execute([$id_medico,$fechaDesde, $fechaHasta]);

        $agenda = $query->fetchAll(PDO::FETCH_OBJ);

        return $agenda;
    }

    
    function getMedicAgendaAfternoon($id_medico,$fechaDesde, $fechaHasta)
    {
        $query = $this->db->prepare('SELECT * FROM turnos_venideros WHERE nro_medico = ? AND fecha_turno IS BETWEEN ? AND ? AND EXTRACT(HOUR FROM fecha_turno) IS BETWEEN 14 AND 19');
        $query->execute([$id_medico,$fechaDesde, $fechaHasta]);

        $agenda = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $agenda;
    }

    public function getMedicById($idMedico){
        $query = $this->db->prepare('SELECT * FROM medico WHERE nro_medico = ?');
        $query->execute([$idMedico]);

        $medico = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $medico;
    }
    
}
