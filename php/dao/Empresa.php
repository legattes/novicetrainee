<?php
require_once "Dao.php";

class Empresa extends Dao
{

    public function getVagas($id)
    {
        $query = "SELECT * FROM vagas 
        WHERE empresa_id = '{$id}'";

        return parent::_exec($query);
    }

    public function login($cnpj, $pass){
        $query = "SELECT * FROM empresa WHERE cnpj = '{$cnpj}' and senha = '{$pass}'";

        return parent::_exec($query);
    }
}
