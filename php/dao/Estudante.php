<?php
require_once "Dao.php";

class Estudante extends Dao
{
    public function login($cpf, $pass){
        $query = "SELECT * FROM estudante WHERE cpf = '{$cpf}' and senha = '{$pass}'";
        return parent::_exec($query);
    }

    public function curriculo($id){
        return self::get($id);
    }
}
