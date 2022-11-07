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
}
