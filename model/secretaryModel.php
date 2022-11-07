<?php

class SecretaryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe;charset=utf8', 'root', '');
    }

    function deleteSecretary($id)
    {
        $query = $this->db->prepare('DELETE FROM secretaria WHERE nro_secretaria = ?');

        $query->execute([$id]);
    }

    function getSecretarias()
    {
        $query = $this->db->prepare('SELECT * FROM secretaria');
        $query->execute();

        $secretarias = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $secretarias;
    }
}
