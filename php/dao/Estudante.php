<?php
require_once "Model.php";

class Estudante extends Model
{
    public function save($id = null)
    {
        if ($id == null) {
            return parent::_insert('estudante', $_POST);
        } else {
            return parent::_update('estudante', $_POST, $id);
        }
    }

    public function get($id)
    {
        return parent::_select('estudante', $id);
    }

    public function all()
    {
        return parent::_select('estudante');
    }


    public function login($cpf, $pass){
        $query = "SELECT * FROM estudante WHERE cpf = '{$cpf}' and senha = '{$pass}'";
        return parent::_exec($query);
    }

    public function curriculo($id){
        return self::get($id);
    }
}
