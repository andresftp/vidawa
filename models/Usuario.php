<?php
namespace Models;
use Db\EntidadBase;

class Usuario extends EntidadBase
{
    public function __construct()
    {
        $table = "usuario";
        parent::__construct($table);
    }

    public function autenticateUser($usr, $pass){
        $pass = sha1($pass);
        $con = $this->db();
        $sql = "SELECT * FROM usuario AS u                                   
                                    WHERE u.usuario='".$usr."' AND u.clave='".$pass."'";
        $res = $con->query($sql);
        $resultSet= array();
        while ($row = $res->fetch_assoc()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

}